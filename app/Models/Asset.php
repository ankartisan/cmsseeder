<?php

namespace App\Models;

use App\Mail\ExceptionMail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Project\Services\AwsService;
use Project\Services\FileService;

class Asset extends Model
{
    CONST USER_TYPE_AVATAR = 1;
    CONST POST_IMAGE = 2;
    CONST POST_FEATURED_IMAGE = 3;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    public $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'path',
        'entity_id',
        'entity_type',
        'type',
        'featured',
        'data'
    ];

    protected $casts = [
        'data' => 'array'
    ];

    public function entity()
    {
        return $this->morphTo();
    }

    public function getUrlAttribute()
    {
        return env('AWS_S3_BASE').'/'.env('AWS_S3_BUCKET').'/'.$this->path;
    }

    public function getIsImageAttribute()
    {
        $nameArr = explode(".", $this->name);
        $ext = $nameArr[count($nameArr) - 1];

        return in_array(strtolower($ext), ['jpg', 'jpeg', 'png']);
    }

    public function getExtensionAttribute()
    {
        $nameArr = explode(".", $this->name);
        return $nameArr[count($nameArr) - 1];
    }

    public function thumbnail($size)
    {
        $data = $this->data;

        $path = isset($data['sizes'][$size]) ? $data['sizes'][$size] : $this->path;

        return env('AWS_S3_BASE').'/'.env('AWS_S3_BUCKET').'/'.$path;
    }

    public function getSizeUrlsAttribute()
    {
        $sizes = [];
        $data = $this->data;

        if(!isset($data['sizes']))
            return $sizes;

        foreach($data['sizes'] as $key => $size) {
            $sizes[$key] = env('AWS_S3_BASE').'/'.env('AWS_S3_BUCKET').'/'.$size;
        }

        return $sizes;
    }

    public function getCompressedUrlAttribute()
    {
        $data = $this->data;

        if(!isset($data['compressed']))
            return "";

        return env('AWS_S3_BASE').'/'.env('AWS_S3_BUCKET').'/'.$data['compressed'];
    }

    /**
     * Resize ( download asset, resize and upload back )
     **/
    public function resize()
    {
        // Prepare key for AWS download ( important for filename urlencoding )
        $keyArr = explode("/", $this->url);
        $keyArr[count($keyArr) - 1] = urlencode($this->name);
        $key = implode("/", $keyArr);

        // Download asset
        $path = FileService::FILES_DIR."/".$this->name;
        file_put_contents($path, fopen($key, 'r'));

        $sizes = Config::getImageSizes();

        // Resize, upload and update asset
        $timestamp = Carbon::now()->timestamp;
        foreach($sizes as $size) {
            // Resize
            $filePath = FileService::resizeImage($path, ['size' => $size, 'newFile' => true, 'filename' => $this->name]);
            // Upload
            $key = 'assets/' . Carbon::now()->format('Y/m/d') .'/'. $timestamp .'/'. FileService::getFileNameFromPath($filePath);
            $result = AwsService::uploadToS3($key, $filePath);
            // Update
            if ($result["status"]) {
                $data = $this->data;
                if(!isset($data['sizes'])) $data['sizes'] = [];
                $data['sizes'][$size] = $key;
                $this->data = $data;
                $this->save();
            }

            if(file_exists($filePath)) unlink($filePath);
        }

        if(file_exists($path)) unlink($path);

        return true;

    }

    /**
     * Compress ( download asset, compress and upload back )
     **/
    public function compress() {

        try {

            // Download asset
            $path = getcwd()."/".FileService::ROOT_FILES_DIR."/".str_replace(" ","_",$this->name);
            AwsService::getFromS3($this->path, $path);

            // Compress
            if(strtolower($this->extension) == "jpeg" || strtolower($this->extension) == "jpg") { // JPG: ImageMagic

                exec('convert -strip -interlace Plane -quality 85% "'.$path.'" "'.$path.'"');
                $filePath = $path;

            } else if (strtolower($this->extension) == "png") { // PNG: PngQuant

                exec('pngquant "'.$path.'"');
                $filePath = str_replace(".png","-fs8.png",$path);
            }

            // Upload
            $key = 'assets/' . Carbon::now()->format('Y/m/d') .'/'. Carbon::now()->timestamp .'/'. FileService::getFileNameFromPath($filePath);
            $result = AwsService::uploadToS3($key, $filePath);
            // Update
            if ($result["status"]) {
                $data = $this->data;
                $data['compressed'] = $key;
                $this->data = $data;
                $this->save();
            }

            // Remove tmp files
            if(file_exists($filePath)) unlink($filePath);
            if(file_exists($path)) unlink($path);

            return true;

        } catch (\Exception $e) {

            Mail::send(new ExceptionMail($e, debug_backtrace()));

            return false;
        }
    }

    public static function search($request)
    {
        $query = (new Asset())->newQuery();
        $query->select('assets.*');

        if($request->has('search')) {
            $search = $request->get('search');

            $query->where(function ($query) use ($search) {
                $query->where('assets.name', 'LIKE', '%'.$search.'%');
            });
        }

        if($request->has('sort')) {
            $query->orderBy('assets.'.$request->get('sort'), $request->get('order'));
        } else {
            $query->orderBy('assets.created_at', 'desc');
        }

        $query->distinct();

        return $query->paginate();
    }



}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

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
        'featured'
    ];

    public function entity()
    {
        return $this->morphTo();
    }

    public function getUrlAttribute()
    {
        return env('AWS_S3_BASE').'/'.env('AWS_S3_BUCKET').'/'.$this->path;
    }

    public function getThumbAttribute()
    {
        $path = explode("/",$this->path);
        $path[count($path) - 1] = "250x250/".end($path);
        return env('AWS_S3_BASE').'/'.env('AWS_S3_BUCKET').'/'.implode('/',$path);
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

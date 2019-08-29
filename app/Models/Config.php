<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Project\Services\AwsService;
use Project\Services\FileService;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Config extends Model
{

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
        'value',
        'deletable',
    ];

    public static function getByName($name)
    {
        return Config::where('name',$name)->first()->value;
    }


    public static function search($request)
    {
        $query = (new Config())->newQuery();
        $query->select('configs.*');

        if($request->has('search')) {
            $search = $request->get('search');

            $query->where(function ($query) use ($search) {
                $query->where('configs.name', 'LIKE', '%'.$search.'%');
                $query->orWhere('configs.value', 'LIKE', '%'.$search.'%');

            });
        }

        if($request->has('sort')) {
            $query->orderBy('configs.'.$request->get('sort'), $request->get('order'));
        } else {
            $query->orderBy('configs.created_at', 'desc');
        }

        $query->distinct();

        return $query->paginate();
    }

}

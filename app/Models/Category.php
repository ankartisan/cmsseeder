<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Project\Services\AwsService;
use Project\Services\FileService;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Category extends Model
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
        'slug'
    ];

    public static function search($request)
    {
        $query = (new Category())->newQuery();
        $query->select('categories.*');

        if($request->has('search')) {
            $search = $request->get('search');

            $query->where(function ($query) use ($search) {
                $query->where('categories.name', 'LIKE', '%'.$search.'%');
                $query->orWhere('categories.slug', 'LIKE', '%'.$search.'%');

            });
        }

        if($request->has('sort')) {
            $query->orderBy('categories.'.$request->get('sort'), $request->get('order'));
        } else {
            $query->orderBy('categories.created_at', 'desc');
        }

        $query->distinct();

        return $query->paginate();
    }

}

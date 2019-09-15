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
        'slug',
        'parent_id',
        'description',
        'order_number'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function assets()
    {
        return $this->hasMany(Asset::class, 'entity_id', 'id')->where(["entity_type" => self::class]);
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

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

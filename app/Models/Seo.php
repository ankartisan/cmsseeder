<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Project\Services\AwsService;
use Project\Services\FileService;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Seo extends Model
{

    public $table = "seo";

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
        'title',
        'description',
        'keywords',
        'entity_id',
        'entity_type',
        'locale'
    ];


    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function entity()
    {
        return $this->morphTo();
    }

}

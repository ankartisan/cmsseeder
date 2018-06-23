<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Project\Services\AwsService;
use Project\Services\FileService;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Post extends Model
{
    const STATUS_DRAFT = 1;
    const STATUS_PUBLISHED = 2;

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
        'content',
        'user_id',
        'slug',
        'status_id',
        'published_at',
        'summary',
        'category_id',
        'locale',
    ];

    protected $dates = [
        'published_at'
    ];

    public function image()
    {
        return $this->hasOne(Asset::class, 'entity_id', 'id')->where(["entity_type" => self::class, "type" => Asset::POST_FEATURED_IMAGE]);
    }

    public function seo()
    {
        return $this->hasMany(Seo::class, 'entity_id', 'id')->where(["entity_type" => self::class])->first();
    }

    public function scopePublished($query)
    {
        return $query->where('status_id', '=', self::STATUS_PUBLISHED);
    }

    public function getStatusAttribute()
    {
        $statuses = [
            self::STATUS_DRAFT => "Draft",
            self::STATUS_PUBLISHED => "Published"
        ];

        return $statuses[$this->status_id];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function manageSeo($request)
    {
        $seos = $request->get('seo');

        foreach ($seos as $seo) {
            if ($seo['id'] == "new") {
                $entitySeo = new Seo(array_merge($seo, ["entity_id" => $this->id, "entity_type" => self::class]));
                $entitySeo->save();
            } else {
                $entitySeo = Seo::find($seo['id']);
                $entitySeo->update($seo);
            }
        }
    }

    /**
     * Upload local file to Amazon S3
     * @param $filePath
     * @return mixed
     */
    public function uploadPhoto($filePath)
    {
        if ($filePath == "") {
            return false;
        }

        $filename = FileService::getFileNameFromPath($filePath);
        $key = 'posts/' . $filename;

        $filePath = FileService::resizeImage($filePath);

        $result = AwsService::uploadToS3($key, $filePath);

        if (!$result["status"]) {
            return $result;
        }

        if($this->image) {
            $this->image->delete();
        }

        $newFile = new Asset([
            'name' => $filename,
            'path' => $key,
            'entity_id' => $this->id,
            'entity_type' => self::class,
            'type' => Asset::POST_FEATURED_IMAGE,
            'featured' => 1
        ]);

        $newFile->save();

        return ["status" => true, "message" => "Successfully", "data" => $newFile];
    }


    public function structuredDataJson()
    {
        return json_encode(
            [ "@graph" =>
                [
                    [
                        "@context" => "http://schema.org/",
                        "@type" => "Article",
                        "mainEntityOfPage" => [
                            "@type" => "WebPage",
                            "@id" => route('post',['slug' => $this->slug]),
                        ],
                        "headline" => $this->summary,
                        "image" => [ $this->image ? $this->image->url : '' ],
                        "datePublished" => (string )$this->published_at,
                        "dateModified" => (string )$this->updated_at,
                        "author" => [
                            "@type" => "Person",
                            "name" => $this->user->initials,
                        ],
                        "publisher" => [
                            "@type" => "Organization",
                            "name" => "CMS Seeder",
                            "logo" => [
                                "@type" => "ImageObject",
                                "url" => "",
                            ],
                        ],
                        "articleBody" => nl2br($this->content),
                        "description" => $this->summary,
                    ]
                ]
            ]);
    }

    public static function search($request)
    {
        $query = (new Post())->newQuery();
        $query->select('posts.*');

        if($request->has('search')) {
            $search = $request->get('search');

            $query->where(function ($query) use ($search) {
                $query->where('posts.title', 'LIKE', '%'.$search.'%');
                $query->orWhere('posts.slug', 'LIKE', '%'.$search.'%');
                $query->orWhere('posts.content', 'LIKE', '%'.$search.'%');
            });
        }

        if($request->has('sort')) {
            $query->orderBy('posts.'.$request->get('sort'), $request->get('order'));
        } else {
            $query->orderBy('posts.created_at', 'desc');
        }

        $query->distinct();

        return $query->paginate();
    }

}

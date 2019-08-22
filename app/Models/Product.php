<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    const STATUS_DRAFT = 1;
    const STATUS_PUBLISHED = 2;

    protected $table = "products";

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
        'description',
        'status_id',
        'price',
        'discount_price'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    public function seo()
    {
        return $this->hasMany(Seo::class, 'entity_id', 'id')->where(["entity_type" => self::class])->first();
    }

    public function assets()
    {
        return $this->hasMany(Asset::class, 'entity_id', 'id')->where(["entity_type" => self::class]);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function getStatusAttribute()
    {
        $statuses = [
            self::STATUS_DRAFT => "Draft",
            self::STATUS_PUBLISHED => "Published"
        ];

        return $statuses[$this->status_id];
    }

    public function getCategoryAttribute()
    {
        return $this->categories() ? $this->categories()->first() : null;
    }

    public function getImageAttribute()
    {
        $image = $this->assets()->where('featured', 1)->first();

        if($image) return $image;

        return $this->assets() ?  $this->assets()->first() : null;
    }

    public function hasCategory($id)
    {
        return in_array($id, $this->categories->pluck('id')->toArray());
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

    public static function search($request)
    {
        $query = (new Product())->newQuery();
        $query->select('products.*');

        if($request->has('search')) {
            $search = $request->get('search');

            $query->where(function ($query) use ($search) {
                $query->where('products.name', 'LIKE', '%'.$search.'%');
                $query->orWhere('products.description', 'LIKE', '%'.$search.'%');
            });
        }

        if($request->has('price_from'))  {
            $query->where('products.price', '>=', $request->get('price_from'));
        }

        if($request->has('price_to'))  {
            $query->where('products.price', '<=', $request->get('price_to'));
        }

        if($request->has('categories')) {
            $query->leftJoin('product_categories', 'products.id', '=', 'product_categories.product_id');
            $query->whereIn('product_categories.category_id', explode(",",$request->get('categories')));
        }

        if($request->has('sort')) {
            $query->orderBy('products.'.$request->get('sort'), $request->get('order'));
        } else {
            $query->orderBy('products.created_at', 'desc');
        }

        $query->distinct();

        return $query->paginate();
    }

}

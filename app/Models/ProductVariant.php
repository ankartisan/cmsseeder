<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{

    protected $table = "product_variants";

    public $guarded = ['id'];

    protected $fillable = [
        'name',
        'description',
        'product_id',
        'uid', // unique combination ID
        'variants',
        'price',
        'price_discount',
        'internal_reference'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function options()
    {
        return $this->hasMany(ProductAttributeOptionCombination::class, 'product_variant_id', 'id');
    }

    public function assets()
    {
        return $this->hasMany(Asset::class, 'entity_id', 'id')->where(["entity_type" => self::class]);
    }

}

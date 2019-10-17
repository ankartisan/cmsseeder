<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{

    protected $table = "product_skus";

    public $guarded = ['id'];

    protected $fillable = [
        'name',
        'description',
        'product_id',
        'sku',
        'variants',
        'price',
        'price_discount',
        'internal_reference'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function assets()
    {
        return $this->hasMany(Asset::class, 'entity_id', 'id')->where(["entity_type" => self::class]);
    }

}

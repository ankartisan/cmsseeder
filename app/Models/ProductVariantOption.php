<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariantOption extends Model
{

    protected $table = "product_variant_options";

    public $guarded = ['id'];

    protected $fillable = [
        'name',
        'product_variant_id'
    ];

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

}

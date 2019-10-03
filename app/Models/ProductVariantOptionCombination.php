<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariantOptionCombination extends Model
{

    protected $table = "product_variant_option_combinations";

    public $guarded = ['id'];

    protected $fillable = [
        'sku_id',
        'product_variant_option_id'
    ];


}

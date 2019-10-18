<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeOptionCombination extends Model
{

    protected $table = "product_attribute_option_combinations";

    public $guarded = ['id'];

    protected $fillable = [
        'product_variant_id',
        'product_attribute_option_id'
    ];

    public function attributeOption()
    {
        return $this->belongsTo(ProductAttributeOption::class, 'product_attribute_option_id');
    }


}

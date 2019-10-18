<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeOption extends Model
{

    protected $table = "product_attribute_options";

    public $guarded = ['id'];

    protected $fillable = [
        'name',
        'product_attribute_id'
    ];

    public function productAttribute()
    {
        return $this->belongsTo(ProductAttribute::class);
    }

}

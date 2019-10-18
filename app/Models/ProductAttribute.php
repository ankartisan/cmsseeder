<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{

    protected $table = "product_attributes";

    public $guarded = ['id'];

    protected $fillable = [
        'name',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function options()
    {
        return $this->hasMany(ProductAttributeOption::class);
    }

    public function getOptionsStringAttribute()
    {
        if(!count($this->options)) return "";

        return implode(",",$this->options->pluck('name')->toArray());
    }

}

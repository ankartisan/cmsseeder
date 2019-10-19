<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{

    protected $table = "cart_products";

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
        'cart_id',
        'product_id',
        'product_variant_id',
        'quantity',
        'price'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }

    public function getTotalPriceAttribute()
    {
        return $this->price * $this->quantity;
    }

    public function getInternalReferenceAttribute()
    {
        if($this->product_variant_id) {
            return $this->productVariant->product->internal_reference;
        } else {
            return $this->product->internal_reference;
        }
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    const STATUS_CREATED = 1;
    const STATUS_ABANDONED = 2;
    const STATUS_ORDERED = 3;

    protected $table = "carts";

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
        'user_id',
        'status_id',
        'hash',
        'price'
    ];

    public function products()
    {
        return $this->hasMany(CartProduct::class, 'cart_id', 'id');
    }

    public function updatePrice()
    {
        $this->price = $this->products()->get()->reduce(function ($carry, $item) {
            return $carry + ($item->product->price * $item->quantity);
        }, 0);
    }

}

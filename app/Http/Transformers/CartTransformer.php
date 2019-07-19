<?php

namespace App\Http\Transformers;

use App\Models\Cart;
use League\Fractal\TransformerAbstract;

class CartTransformer extends TransformerAbstract {

    /**
     * @param Cart $cart
     * @return array
     */
    public function transform(Cart $cart)
    {
        return [
            "hash" => $cart->hash,
            "products" => $cart->products,
            "products_count" => $cart->products()->count()
        ];
    }

}
<?php

namespace App\Http\Transformers;

use App\Models\Asset;
use App\Models\CartProduct;
use League\Fractal\TransformerAbstract;

class CartProductTransformer extends TransformerAbstract {

    /**
     * @param CartProduct $cartProduct
     * @return array
     */
    public function transform(CartProduct $cartProduct)
    {
        return [
            'quantity' => (int) $cartProduct->quantity,
            'total_price' => $cartProduct->total_price
        ];
    }

}
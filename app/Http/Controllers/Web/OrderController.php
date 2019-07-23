<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\ApiController;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class OrderController extends ApiController
{
    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    */

    public function create(Request $request)
    {
        $cart = Cart::where(['hash' => Cookie::get('cs_cart_hash')])->first();

        // Create user
        $user = User::create(array_merge($request->all(),['password' => 'password']));
        $user->save();
        $user->syncRoles(['User']);

        // Create order
        $entity = Order::create(['user_id' => $user->id, 'cart_id' => $cart->id, 'hash' => md5(uniqid(rand(), true))]);
        $entity->save();

        return $this->respond(["message" => "Order created successfully", "data" => $entity->id]);
    }

}
<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\ApiController;
use App\Models\Cart;
use App\Models\Customer;
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

        // Create customer
        $customer = Customer::create(array_merge($request->all(),['password' => 'password']));
        $customer->save();

        // Create order
        $entity = Order::create(['customer_id' => $customer->id, 'cart_id' => $cart->id, 'hash' => md5(uniqid(rand(), true))]);
        $entity->save();

        return $this->respond(["message" => "Order created successfully", "data" => $entity->id]);
    }

}
<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\ApiController;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\CustomerAddress;
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
        $customer = Customer::create(array_merge($request->get('customer'),['username' => md5(uniqid(rand(), true)), 'password' => md5(uniqid(rand(), true))]));
        $customer->save();

        // Create address
        if($request->get('delivery_billing_address')) { // Billing and delivery address are the same
            $address = Address::create(array_merge($request->get('billing'),['type_id' => Address::TYPE_BILLING_DELIVERY]));
            CustomerAddress::create(['customer_id' => $customer->id, 'address_id' => $address->id]);
        }

        // Create order
        $entity = Order::create(['customer_id' => $customer->id, 'cart_id' => $cart->id, 'hash' => md5(uniqid(rand(), true))]);
        $entity->save();

        return $this->respond(["message" => "Order created successfully", "data" => $entity->id]);
    }

}
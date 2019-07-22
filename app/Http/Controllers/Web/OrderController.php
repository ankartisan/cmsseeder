<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\ApiController;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends ApiController
{
    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    */

    public function create(Request $request)
    {
        // ToDo Create user
        $entity = Order::create(array_merge(['user_id' => 1],$request->all()));
        $entity->save();

        return $this->respond(["message" => "Order created successfully", "data" => $entity->id]);
    }

}
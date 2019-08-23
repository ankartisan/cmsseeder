<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends ApiController
{
    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $entity = Order::find($id);

        $entity->update($request->all());

        return $this->respond(["message" => "Order updated successfully"]);
    }

    public function delete(Request $request, $id)
    {
        Order::find($id)->delete();

        return $this->respond(["message" => "Order deleted successfully"]);
    }

    /*
    |--------------------------------------------------------------------------
    | VIEWS
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $entities = Order::search($request);

        return view('admin/order/orders_index', ["entities" => $entities]);
    }

    public function search(Request $request)
    {

        $entities = Order::search($request);

        return $this->respond(view('admin/order/orders_list', ["entities" => $entities])->render());
    }

    public function show(Request $request, $id)
    {
        $entity = Order::find($id);

        return view('admin/order/order_show', ["entity" => $entity]);
    }


}

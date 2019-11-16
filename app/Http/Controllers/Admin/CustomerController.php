<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use App\Models\Account;
use App\Models\Customer;
use Illuminate\Http\Request;


class CustomerController extends ApiController
{

    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $account = Account::create(['username' => $request->get('email'), 'password' => $request->get('password'), 'enabled' => true]);

        Customer::create(array_merge(['account_id' => $account->id], $request->all()));

        return $this->respond(["message" => "Customer created successfully"]);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);

        $customer->account->update(['username' => $request->get('email')]);

        $customer->update($request->all());

        return $this->respond(["message" => "Customer updated successfully"]);
    }

    public function delete(Request $request, $id)
    {
        $customer = Customer::find($id);

        $customer->account->delete();

        $customer->delete();

        return $this->respond(["message" => "Customer deleted successfully"]);
    }


    /*
    |--------------------------------------------------------------------------
    | VIEWS
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $entities = Customer::search($request);

        return view('admin/customer/customers_index', ["entities" => $entities]);
    }

    public function search(Request $request)
    {
        $entities = Customer::search($request);

        return $this->respond(view('admin/customer/customers_list', ["entities" => $entities])->render());
    }

    public function show(Request $request, $id)
    {
        $entity = $id == "new" ? new Customer() : Customer::find($id);

        return view('admin/customer/customer_show', ["entity" => $entity]);
    }

}

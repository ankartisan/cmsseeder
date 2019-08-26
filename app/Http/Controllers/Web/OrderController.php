<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\ApiController;
use App\Models\Account;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class OrderController extends ApiController
{
    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    */

    public function create(Request $request)
    {

        DB::beginTransaction();

        try {
            $cart = Cart::where(['hash' => Cookie::get('cs_cart_hash')])->first();


            if($request->get('customer_id')) {  // Order with existing account
                // Update customer
                $customer = Customer::find($request->get('customer_id'));
                $customer->update($request->get('customer'));

                // Update address
                if($request->get('delivery_billing_address')) { // Billing and delivery address are the same
                    $customer->address()->update($request->get('billing'));
                }

            } else {  // Order without account or with new account
                // Create account
                if($request->get('create_account')) {
                    $account = Account::create(array_merge(
                        $request->get('customer'),
                        ['username' => $request->get('customer')['email']]));
                }

                // Create customer
                $customer = Customer::create(array_merge(
                    $request->get('customer'),
                    ['account_id' => isset($account) ? $account->id : null]
                ));

                // Create address
                if($request->get('delivery_billing_address')) { // Billing and delivery address are the same
                    $address = Address::create(array_merge($request->get('billing'),['type_id' => Address::TYPE_BILLING_DELIVERY]));
                    CustomerAddress::create(['customer_id' => $customer->id, 'address_id' => $address->id]);
                } else { // Billing and delivery address are different
                    $billingAddress = Address::create(array_merge($request->get('billing'),['type_id' => Address::TYPE_BILLING]));
                    CustomerAddress::create(['customer_id' => $customer->id, 'address_id' => $billingAddress->id]);

                    $deliveryAddress = Address::create(array_merge($request->get('delivery'),['type_id' => Address::TYPE_DELIVERY]));
                    CustomerAddress::create(['customer_id' => $customer->id, 'address_id' => $deliveryAddress->id]);
                }
            }

            // Create order
            $entity = Order::create(['customer_id' => $customer->id, 'cart_id' => $cart->id, 'price' => $cart->price]);
            $entity->update(['number' => $entity->generateUniqueNumber()]);
            $entity->save();

            // Destroy cart cookie
            $cookie = Cookie::forget('cs_cart_hash');

            DB::commit();

            return $this->respond(["message" => "Order created successfully", "data" => $entity->id])->withCookie($cookie);
        } catch(\Exception $e) {

            DB::rollBack();

            return $this->setStatusCode(400)->respondWithError(["message" => $e->getMessage()]);

        }

    }

    /*
    |--------------------------------------------------------------------------
    | VIEW
    |--------------------------------------------------------------------------
    */

    public function completed(Request $request)
    {
        return view('order_completed');
    }

}
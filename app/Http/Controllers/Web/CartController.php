<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\ApiController;
use App\Http\Transformers\CartProductTransformer;
use App\Http\Transformers\CartTransformer;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Country;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CartController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        $this->setTransformer(new CartTransformer());
    }

    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    */

    public function add(Request $request, $product_id)
    {
        $product = Product::find($product_id);

        if($request->has('product_variant_id')) {
            $variant = ProductVariant::find($request->get('product_variant_id'));
        }

        // Create cart if not exists
        $cart = Cart::where(['hash' => Cookie::get('cs_cart_hash')])->first();

        if(!$cart) {

            $cart_hash = md5(uniqid(rand(), true));

            Cart::create(['hash' => $cart_hash]);

            Cookie::queue('cs_cart_hash', $cart_hash, 360);
            $cart = Cart::where(['hash' => $cart_hash])->first();

        }

        // Add product to cart
        $quantity = $request->has('quantity') ? $request->get('quantity') : 1;
        CartProduct::create([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price' => isset($variant) ? $variant->price : $product->price,
            'product_variant_id' => isset($variant) ? $variant->id : null
        ]);

        // Update cart price
        $cart->updatePrice();
        $cart->save();

        return $this->respond(view('components/sidebar_cart', ["cart" => $cart])->render());
    }

    public function remove(Request $request, $cart_product_id)
    {
        $cart_product = CartProduct::find($cart_product_id);
        $cart_product->delete();

        $cart = Cart::where(['hash' => Cookie::get('cs_cart_hash')])->first();

        // Update cart price
        $cart->updatePrice();
        $cart->save();

        $response = [
            "cart_container_html" => view('components/sidebar_cart', ["cart" => $cart])->render(),
            "order_summary_container_html" => view('components/order_summary', ["cart" => $cart])->render(),
            "cart_products_count" => count($cart->products)
        ];

        return $this->respond($response);
    }

    public function update(Request $request, $cart_product_id) {

        $this->setTransformer(new CartProductTransformer());


        $cart_product = CartProduct::find($cart_product_id);
        $cart_product->update($request->all());

        $cart = Cart::where(['hash' => Cookie::get('cs_cart_hash')])->first();

        // Update cart price
        $cart->updatePrice();
        $cart->save();

        $response = [
            "cart_container_html" => view('components/sidebar_cart', ["cart" => $cart])->render(),
            "order_summary_container_html" => view('components/order_summary', ["cart" => $cart])->render(),
            "cart_product" => $this->setTransformer(new CartProductTransformer())->transformItem($cart_product)['data']
        ];

        return $this->respond($response);
    }

    /*
    |--------------------------------------------------------------------------
    | VIEW
    |--------------------------------------------------------------------------
    */

    public function cart(Request $request)
    {
        $cart = Cart::where(['hash' => Cookie::get('cs_cart_hash')])->first();

        return view('cart', ["cart" => $cart]);
    }

    public function checkout(Request $request)
    {
        $cart = Cart::where(['hash' => Cookie::get('cs_cart_hash')])->first();

        $customer = Auth::guard('customer')->user() ? Auth::guard('customer')->user()->customer() : null;

        $countries = Country::all();

        return view('checkout', ["cart" => $cart, "countries" => $countries, "customer" => $customer]);
    }

}

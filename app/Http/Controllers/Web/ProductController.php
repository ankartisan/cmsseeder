<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\ApiController;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends ApiController
{

    /*
    |--------------------------------------------------------------------------
    | VIEWS
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $products = Product::search($request);

        return view('product/products_index', ["products" => $products]);
    }

    public function search(Request $request)
    {
        $products = Product::search($request);

        return $this->respond(view('product/products_list', ["products" => $products])->render());
    }

    public function show(Request $request, $id)
    {
        $product = Product::find($id);

        return view('product/product_show', ["product" => $product]);
    }


}

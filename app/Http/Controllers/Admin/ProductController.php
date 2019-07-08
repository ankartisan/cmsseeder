<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends ApiController
{
    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $entity = Product::create($request->all());
        $entity->save();

        if($request->has('seo')) {
            $entity->manageSeo($request);
        }

        return $this->respond(["message" => "Product created successfully", "data" => $entity->id]);
    }

    public function update(Request $request, $id)
    {
        $entity = Product::find($id);

        $entity->update($request->all());

        if($request->has('seo')) {
            $entity->manageSeo($request);
        }

        return $this->respond(["message" => "Product updated successfully"]);
    }

    public function delete(Request $request, $id)
    {
        Product::find($id)->delete();

        return $this->respond(["message" => "Product deleted successfully"]);
    }

    /*
    |--------------------------------------------------------------------------
    | VIEWS
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $entities = Product::search($request);

        return view('admin/product/products_index', ["entities" => $entities]);
    }

    public function search(Request $request)
    {

        $entities = Product::search($request);

        return $this->respond(view('admin/product/products_list', ["entities" => $entities])->render());
    }

    public function show(Request $request, $id)
    {
        $entity = $id == "new" ? new Product() : Product::find($id);

        return view('admin/product/product_show', ["entity" => $entity]);
    }


}

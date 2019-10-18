<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use App\Models\Asset;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeOption;
use App\Models\ProductAttributeOptionCombination;
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

        if($request->get('assets')) {
            Asset::whereIn('id', $request->get('assets'))->update(['entity_id' => $entity->id]);
        }

        $entity->categories()->sync($request->get('categories'));

        return $this->respond(["message" => "Product created successfully", "data" => $entity->id]);
    }

    public function update(Request $request, $id)
    {
        $entity = Product::find($id);

        $entity->update($request->all());

        if($request->has('seo')) {
            $entity->manageSeo($request);
        }

        $entity->categories()->sync($request->get('categories'));

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

        $categories = Category::where('parent_id', null)->get();

        return view('admin/product/product_show', ["entity" => $entity, "categories" => $categories]);
    }

    public function variants(Request $request, $id)
    {
        $entity = Product::find($id);

        return view('admin/product/product_variants', ["entity" => $entity]);
    }

    public function variant(Request $request, $id)
    {
        $entity = ProductVariant::find($id);

        return view('admin/product/product_variant_show', ["entity" => $entity]);
    }


}

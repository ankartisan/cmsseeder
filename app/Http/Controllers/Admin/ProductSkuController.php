<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use App\Models\Asset;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSku;
use App\Models\ProductVariant;
use App\Models\ProductVariantOption;
use App\Models\ProductVariantOptionCombination;
use Illuminate\Http\Request;

class ProductSkuController extends ApiController
{
    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $entity = ProductSku::find($id);

        $entity->update($request->all());

        return $this->respond(["message" => "Variant updated successfully"]);
    }

    public function delete(Request $request, $id)
    {
        ProductSku::find($id)->delete();

        return $this->respond(["message" => "Variant deleted successfully"]);
    }

    /*
    |--------------------------------------------------------------------------
    | VIEWS
    |--------------------------------------------------------------------------
    */

    public function index(Request $request, $id)
    {
        $entity = Product::find($id);

        return view('admin/product/product_variants', ["entity" => $entity]);
    }

    public function show(Request $request, $id)
    {
        $entity = ProductSku::find($id);

        return view('admin/product/product_variant_show', ["entity" => $entity]);
    }


}

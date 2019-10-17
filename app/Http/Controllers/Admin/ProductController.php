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

    public function updateVariants(Request $request, $id)
    {
        $product = Product::find($id);
        $variants = $request->get('variants');

        // Create product variants and options
        foreach($variants as $variant) {
            $productVariant = ProductVariant::create(['product_id' => $product->id, 'name' => $variant['name']]);
            $options = explode(",",$variant['options']);
            foreach($options as $option) {
                ProductVariantOption::create(['product_variant_id' => $productVariant->id, 'name' => $option]);
            }
        }

        // Generate product SKU
        $combinations = $product->getVariantCombinations();
        foreach($combinations as $combination) {

            $sku = ""; // Generate unique SKU
            $optionsArr = []; // Save SKU relation with variant options
            $variantsArr = []; // SKU description readable for humans

            foreach($combination as $value) {
                $valueArr = explode(":", $value);
                $variant = ProductVariant::find($valueArr[0]);
                $option = ProductVariantOption::find($valueArr[1]);
                $optionsArr[] = $option->id;
                $sku .= $product->id . $variant->id . $option->id;
                $variantsArr[] = $variant->name .":".$option->name;
            }

            // Save SKU
            $productSku = ProductSku::create([
                'product_id' => $product->id,
                'sku' => $sku,
                'variants' => implode("; ", $variantsArr),
                'price' => $product->price,
            ]);

            // Save SKU option combinations
            foreach($optionsArr as $optionId) {
                ProductVariantOptionCombination::create([
                    'sku_id' => $productSku->id,
                    'product_variant_option_id' => $optionId
                ]);
            }

        }

        return $this->respond(["message" => "Product variants updated successfully"]);
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

    public function skus(Request $request, $id)
    {
        $entity = Product::find($id);

        return view('admin/product/product_variants', ["entity" => $entity]);
    }

    public function sku(Request $request, $id)
    {
        $entity = ProductSku::find($id);

        return view('admin/product/product_variant_show', ["entity" => $entity]);
    }


}

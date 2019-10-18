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

class ProductVariantController extends ApiController
{
    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $entity = ProductVariant::find($id);

        $entity->update($request->all());

        return $this->respond(["message" => "Variant updated successfully"]);
    }

    public function delete(Request $request, $id)
    {
        ProductVariant::find($id)->delete();

        return $this->respond(["message" => "Variant deleted successfully"]);
    }

    public function generate(Request $request, $id)
    {
        $product = Product::find($id);
        $attributes = $request->get('variants');

        // Delete product attributes
        $currentAttributesIds = $product->attributes->pluck('id')->toArray();
        $attributesIds = collect($attributes)->pluck('id')->toArray();
        foreach($currentAttributesIds as $currentAttributeId) {
            if(!in_array($currentAttributeId, $attributesIds)) {
                ProductAttributeOption::where('product_attribute_id', $currentAttributeId)->delete(); // Delete attribute options
                ProductAttribute::find($currentAttributeId)->delete(); // Delete attribute
            }
        }

        // Create/update product attribute and options
        foreach($attributes as $attribute) {

            $options = explode(",",$attribute['options']);

            if(isset($attribute['id'])) {
                $productAttribute = ProductAttribute::find($attribute['id']);
            } else {
                $productAttribute = ProductAttribute::create(['product_id' => $product->id, 'name' => $attribute['name']]);
            }

            // Delete attribute options
            if(count($productAttribute->options)) {
                $currentOptionNames = $productAttribute->options->pluck('name')->toArray();
                foreach($currentOptionNames as $currentOptionName) {
                    if(!in_array($currentOptionName, $options)) { // Delete attribute options
                        ProductAttributeOption::where([
                            'product_attribute_id' => $productAttribute->id,
                            'name' => $currentOptionName ])->first()->delete();
                    }
                }
            }
            // Add attribute options
            foreach($options as $option) {
                $productAttributeOption = ProductAttributeOption::where(['product_attribute_id' => $productAttribute->id, 'name' => $option])->first();
                if(!$productAttributeOption) {
                    ProductAttributeOption::create(['product_attribute_id' => $productAttribute->id, 'name' => $option]);
                }
            }
        }

        // Generate product variants
        $combinations = $product->getVariantCombinations();
        foreach($combinations as $combination) {

            $uid = ""; // Generate unique UID
            $optionsArr = []; // Save SKU relation with variant options
            var_dump($combination);
            if(is_array($combination)) {
                foreach($combination as $value) {
                    $valueArr = explode(":", $value);
                    $attribute = ProductAttribute::find($valueArr[0]);
                    $option = ProductAttributeOption::find($valueArr[1]);
                    $optionsArr[] = $option->id;
                    $uid .= $product->id . $attribute->id . $option->id;
                }
            } else {
                $valueArr = explode(":", $combination);
                $attribute = ProductAttribute::find($valueArr[0]);
                $option = ProductAttributeOption::find($valueArr[1]);
                $optionsArr[] = $option->id;
                $uid .= $product->id . $attribute->id . $option->id;
            }

            // Check if variant exists
            $productVariant = ProductVariant::where('uid', $uid)->first();
            if($productVariant) continue;

            // Save variant
            $productVariant = ProductVariant::create([
                'product_id' => $product->id,
                'uid' => $uid,
                'price' => $product->price,
            ]);

            // Save variant option combinations
            foreach($optionsArr as $optionId) {
                ProductAttributeOptionCombination::create([
                    'product_variant_id' => $productVariant->id,
                    'product_attribute_option_id' => $optionId
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

    public function index(Request $request, $id)
    {
        $entity = Product::find($id);

        return view('admin/product/product_variants', ["entity" => $entity]);
    }

    public function show(Request $request, $id)
    {
        $entity = ProductVariant::find($id);

        return view('admin/product/product_variant_show', ["entity" => $entity]);
    }


}

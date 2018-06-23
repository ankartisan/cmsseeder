<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Project\Services\FileService;

class CategoryController extends ApiController
{

    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $entity = Category::create($request->all());
        $entity->save();

        return $this->respond(["message" => "Category created successfully", "data" => $entity->id]);
    }

    public function update(Request $request, $id)
    {
        $entity = Category::find($id);

        $entity->update($request->all());


        return $this->respond(["message" => "Category updated successfully"]);
    }

    public function delete(Request $request, $id)
    {
        Category::find($id)->delete();

        return $this->respond(["message" => "Category deleted successfully"]);
    }


    /*
    |--------------------------------------------------------------------------
    | VIEWS
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $entities = Category::search($request);

        return view('admin/category/categories_index', ["entities" => $entities]);
    }

    public function search(Request $request)
    {
        $entities = Category::search($request);

        return $this->respond(view('admin/category/categories_list', ["entities" => $entities])->render());
    }

    public function show(Request $request, $id)
    {
        $entity = $id == "new" ? new Category() : Category::find($id);

        return view('admin/category/category_show', ["entity" => $entity]);
    }

}

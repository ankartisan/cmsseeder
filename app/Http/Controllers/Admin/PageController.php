<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends ApiController
{
    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $entity = Page::create($request->all());
        $entity->save();

        if($request->has('seo')) {
            $entity->manageSeo($request);
        }

        return $this->respond(["message" => "Page created successfully", "data" => $entity->id]);
    }

    public function update(Request $request, $id)
    {
        $entity = Page::find($id);

        $entity->update($request->all());

        if($request->has('seo')) {
            $entity->manageSeo($request);
        }

        return $this->respond(["message" => "Page updated successfully"]);
    }

    public function delete(Request $request, $id)
    {
        Page::find($id)->delete();

        return $this->respond(["message" => "Page deleted successfully"]);
    }

    /*
    |--------------------------------------------------------------------------
    | VIEWS
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $entities = Page::search($request);

        return view('admin/page/pages_index', ["entities" => $entities]);
    }

    public function search(Request $request)
    {

        $entities = Page::search($request);

        return $this->respond(view('admin/page/pages_list', ["entities" => $entities])->render());
    }

    public function show(Request $request, $id)
    {
        $entity = $id == "new" ? new Page() : Page::find($id);

        $templates = [];
        $files = array_slice(scandir(getcwd()."/../resources/views/pages"), 2);

        foreach($files as $file) {
            $templates[] = str_replace(".blade.php","",$file);
        }

        return view('admin/page/page_show', ["entity" => $entity, "templates" => $templates]);
    }


}

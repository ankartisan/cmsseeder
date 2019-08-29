<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends ApiController
{

    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $entity = Config::create($request->all());

        return $this->respond(["message" => "Config created successfully", "data" => $entity->id]);
    }

    public function update(Request $request, $id)
    {
        $entity = Config::find($id);

        $entity->update($request->all());

        return $this->respond(["message" => "Config updated successfully"]);
    }

    public function delete(Request $request, $id)
    {
        $entity = Config::find($id);

        if(!$entity->deletable) {
            $this->setStatusCode(400)->respondWithError("Config can't be deleted");
        }

        $entity->delete();

        return $this->respond(["message" => "Config deleted successfully"]);
    }


    /*
    |--------------------------------------------------------------------------
    | VIEWS
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $entities = Config::search($request);

        return view('admin/config/configs_index', ["entities" => $entities]);
    }

    public function search(Request $request)
    {
        $entities = Config::search($request);

        return $this->respond(view('admin/config/configs_list', ["entities" => $entities])->render());
    }

    public function show(Request $request, $id)
    {
        $entity = $id == "new" ? new Config() : Config::find($id);

        return view('admin/config/config_show', ["entity" => $entity]);
    }

}

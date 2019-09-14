<?php

namespace App\Http\Controllers\Admin;

use App\Events\AssetUploaded;
use App\Http\Controllers\ApiController;
use App\Models\Asset;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Project\Services\AwsService;
use Project\Services\FileService;

class AssetController extends ApiController
{

    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    */


    public function delete(Request $request, $id)
    {
        $file = Asset::find($id);

        AwsService::removeFromS3($file->path);

        if(isset($file->data['sizes'])) {
            foreach($file->data['sizes'] as $sizePath) {
                AwsService::removeFromS3($sizePath);
            }
        }

        $file->delete();

        return $this->respond(["message" => "File deleted successfully"]);
    }

    public function upload(Request $request)
    {
        $filePath = FileService::saveFileLocal($request->files->get('file'));

        $filename = FileService::getFileNameFromPath($filePath);

        $key = 'assets/' . Carbon::now()->format('Y/m/d') .'/'.Carbon::now()->timestamp .'/'. $filename;
        $result = AwsService::uploadToS3($key, $filePath);

        if (!$result["status"]) {
            return $this->setStatusCode(400)->respondWithError($result);
        }

        $newFile = new Asset([
            'name' => $filename,
            'path' => $key,
            'entity_id' => $request->get('entity_id') ? $request->get('entity_id') : 0,
            'entity_type' => $request->get('entity_type') ? $request->get('entity_type') : 0,
            'type' => $request->get('type') ? $request->get('type') : null,
            'featured' => $request->get('featured') ? $request->get('featured') : null
        ]);

        $newFile->save();

        if(file_exists($filePath)) unlink($filePath);

        event(new AssetUploaded($newFile));

        if($request->get('return') == "assets_container") {
            $assets = Asset::where(["entity_type" => $request->get('entity_type'), "entity_id" => $request->get('entity_id')])->get();
            return $this->respond(view('admin/components/assets_container', ["assets" => $assets])->render());
        }

        return $this->respond(["data" => $newFile->url]);
    }

    public function update(Request $request, $id)
    {
        $asset = Asset::find($id);

        $asset->update(["featured" =>  $request->get('featured')]);

        return $this->respond($asset);
    }

    /*
    |--------------------------------------------------------------------------
    | VIEWS
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $entities = Asset::search($request);

        return view('admin/asset/assets_index', ["entities" => $entities]);
    }

    public function search(Request $request)
    {
        $entities = Asset::search($request);

        return $this->respond(view('admin/asset/assets_list', ["entities" => $entities])->render());
    }

    public function show(Request $request, $id)
    {
        $entity = $id == "new" ? new Asset() : Asset::find($id);

        return view('admin/asset/asset_show', ["entity" => $entity]);
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Transformers\AssetTransformer;
use App\Http\Transformers\UserTransformer;
use App\Models\User;
use Illuminate\Http\Request;
use Project\Services\FileService;


class UserController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        $this->setTransformer(new UserTransformer());
    }

    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    */

    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->all());
        $user->save();

        $user->syncRoles($request->get('roles'));

        return $this->respond(["message" => "User created successfully"]);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);

        $user->update($request->all());

        $user->syncRoles($request->get('roles'));

        return $this->respond(["message" => "User updated successfully"]);
    }

    public function delete(Request $request, $id)
    {
        User::find($id)->delete();

        return $this->respond(["message" => "User deleted successfully"]);
    }

    public function avatarUpload(Request $request, $id)
    {
        $entity = User::find($id);

        $file = FileService::saveFileLocal($request->files->get('file'));

        // Upload to AWS
        $response = $entity->uploadPhoto($file);

        if(!$response["status"]) {
            return $this->setStatusCode(400)->respondWithError($response['message']);
        }

        $uploadedFile = $response['data'];

        return $this->respond(view('admin/components/user_avatar', ['file' => $uploadedFile])->render());
    }

    /*
    |--------------------------------------------------------------------------
    | VIEWS
    |--------------------------------------------------------------------------
    */

    public function users(Request $request)
    {
        $entities = User::search($request);

        return view('admin/user/users_index', ["entities" => $entities]);
    }

    public function search(Request $request)
    {
        $entities = User::search($request);

        return $this->respond(view('admin/user/users_list', ["entities" => $entities])->render());
    }

    public function user(Request $request, $id)
    {
        $user = $id == "new" ? new User() : User::find($id);

        return view('admin/user/user_show', ["user" => $user]);
    }

}

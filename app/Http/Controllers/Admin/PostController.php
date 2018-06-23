<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Project\Services\FileService;

class PostController extends ApiController
{

    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $post = Post::create($request->all());
        $post->save();

        if($request->has('seo')) {
            $post->manageSeo($request);
        }

        return $this->respond(["message" => "Post created successfully", "data" => $post->id]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post->update($request->all());

        if($request->has('seo')) {
            $post->manageSeo($request);
        }

        return $this->respond(["message" => "Post updated successfully"]);
    }

    public function delete(Request $request, $id)
    {
        Post::find($id)->delete();

        return $this->respond(["message" => "Post deleted successfully"]);
    }

    public function photoUpload(Request $request, $id)
    {
        $post = Post::find($id);

        $file = FileService::saveFileLocal($request->files->get('file'));

        // Upload to AWS
        $response = $post->uploadPhoto($file);

        if(!$response["status"]) {
            return $this->setStatusCode(400)->respondWithError($response['message']);
        }

        $uploadedFile = $response['data'];

        return $this->respond(view('admin/components/post_featured_image', ['file' => $uploadedFile])->render());
    }


    /*
    |--------------------------------------------------------------------------
    | VIEWS
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $entities = Post::search($request);

        return view('admin/post/posts_index', ["entities" => $entities]);
    }

    public function search(Request $request)
    {

        $entities = Post::search($request);

        return $this->respond(view('admin/post/posts_list', ["entities" => $entities])->render());
    }

    public function show(Request $request, $id)
    {
        $post = $id == "new" ? new Post() : Post::find($id);

        $users = User::all();
        $categories = Category::all();

        return view('admin/post/post_show', ["post" => $post, "users" => $users, "categories" => $categories]);
    }

}

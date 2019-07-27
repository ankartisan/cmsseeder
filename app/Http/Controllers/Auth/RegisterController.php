<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegistered;
use App\Http\Controllers\ApiController;
use App\Http\Requests\UserRegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RegisterController extends ApiController
{
    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    */

    public function register(UserRegistrationRequest $request)
    {
        $user = User::create(array_merge($request->all(),['username' => $request->get('email'), 'confirmation_code' => str_random(30)]));

        $user->assignRole(Role::from('roles') ->whereIn('name', ['user'])->first());
        $user->save();

        event(new UserRegistered($user));

        return $this->respond(["message" => "Account created successfully"]);
    }

    /*
    |--------------------------------------------------------------------------
    | VIEW
    |--------------------------------------------------------------------------
    */

    public function registerView(Request $request)
    {
        return view('auth/register');
    }
}

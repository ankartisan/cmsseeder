<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegistered;
use App\Http\Controllers\ApiController;
use App\Http\Requests\LoginFacebookRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends ApiController
{
    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    */
    public function login(LoginRequest $request)
    {
        $user = User::whereEmail($request->get('email'))->first();

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];


        if (!Auth::attempt($credentials)) {
            return $this->setStatusCode(422)->respondWithError("Email or password are wrong");
        }

        if(!$user->confirmed) {
            return $this->setStatusCode(422)->respondWithError("Account is not confirmed");
        }

        return $this->respond("Login successfully");
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }

    public function loginFacebook(LoginFacebookRequest $request)
    {
        $user = User::where(['email' => $request->get('email'), 'facebook_id' => $request->get('id')])->first();
        // Login
        if($user) {
            Auth::login($user);
            return $this->respond("Login successfully");
        }
        // Register & Login
        $user = User::create(array_merge($request->all(),
            ['facebook_id' => $request->get('id'),'password' => str_random(10), 'confirmed' => 1]));
        $user->assignRole(Role::from('roles') ->whereIn('name', ['customer'])->first());
        $user->save();

        event(new UserRegistered($user));

        Auth::login($user);

        return $this->respond("Account created and login successfully");

    }

    /*
    |--------------------------------------------------------------------------
    | VIEW
    |--------------------------------------------------------------------------
    */

    public function confirmation($confirmation_code)
    {

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if(!$user) {
            throw new \Exception("User not found");
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        return Redirect::route('login');
    }
}

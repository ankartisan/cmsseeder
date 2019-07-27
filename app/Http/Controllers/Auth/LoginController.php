<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends ApiController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    */

    public function login(LoginRequest $request)
    {
        $user = User::whereUsername($request->get('username'))->first();

        if (!$this->attemptLogin($request)) {
            return $this->setStatusCode(422)->respondWithError("Email or password are wrong");
        }

        if(!$user->confirmed) {
            return $this->setStatusCode(422)->respondWithError("Account is not confirmed");
        }

        return $this->respond("Login successfully");
    }

    /*
    |--------------------------------------------------------------------------
    | VIEW
    |--------------------------------------------------------------------------
    */

    public function loginView(Request $request)
    {
        return view('auth/login');
    }

}

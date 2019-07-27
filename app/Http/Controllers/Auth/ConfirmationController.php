<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class ConfirmationController extends ApiController
{
    /*
    |--------------------------------------------------------------------------
    | AJAX
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

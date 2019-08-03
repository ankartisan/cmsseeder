<?php

namespace App\Models;

use App\Mail\UserResetPasswordMail;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Auth\Passwords\CanResetPassword as ResetPassword;


class Customer extends Model implements AuthenticatableContract,AuthorizableContract,CanResetPasswordContract
{
    use Authenticatable, Authorizable, HasRoles, ResetPassword, Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'first_name', 'last_name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /*
    |--------------------------------------------------------------------------
    | DOMAIN METHODS
    |--------------------------------------------------------------------------
    */

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        Mail::send(new UserResetPasswordMail($this,$token));
    }

    public static function search($request)
    {
        $query = (new User())->newQuery();
        $query->select('customers.*');

        if($request->has('search')) {
            $search = $request->get('search');

            $query->where(function ($query) use ($search) {
                $query->where('customers.username', 'LIKE', '%'.$search.'%');
                $query->orWhere('customers.first_name', 'LIKE', '%'.$search.'%');
                $query->orWhere('customers.last_name', 'LIKE', '%'.$search.'%');
                $query->orWhere('customers.email', 'LIKE', '%'.$search.'%');
            });
        }

        if($request->has('sort')) {
            $query->orderBy('customers.'.$request->get('sort'), $request->get('order'));
        } else {
            $query->orderBy('customers.created_at', 'desc');
        }

        $query->distinct();

        return $query->paginate();
    }

}

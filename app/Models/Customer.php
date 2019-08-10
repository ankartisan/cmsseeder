<?php

namespace App\Models;

use App\Mail\UserResetPasswordMail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Customer extends Model
{
    const TYPE_PERSON = 1;
    const TYPE_COMPANY = 2;

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
    protected $fillable = ['type_id', 'account_id', 'company_name', 'first_name', 'last_name', 'email', 'company_tax_number', 'company_registration_number'];


    public function addresses()
    {
        return $this->hasManyThrough(Address::class, CustomerAddress::class, 'customer_id', 'id');
    }

    public function billingAddress()
    {
        return $this->addresses()->whereIn('type_id', [Address::TYPE_BILLING, Address::TYPE_BILLING_DELIVERY])->first();
    }

    public function deliveryAddress()
    {
        return $this->addresses()->whereIn('type_id', [Address::TYPE_DELIVERY, Address::TYPE_BILLING_DELIVERY])->first();
    }

    public function address()
    {
        return $this->addresses()->where('type_id', Address::TYPE_BILLING_DELIVERY)->first();
    }

    public function isDeliveryBillingAddress()
    {
        return $this->addresses()->whereIn('type_id', [Address::TYPE_BILLING_DELIVERY])->first() ? True : False;
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

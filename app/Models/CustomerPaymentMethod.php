<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerPaymentMethod extends Model
{

    protected $table = "customer_payment_methods";

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    public $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'payment_method_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

}

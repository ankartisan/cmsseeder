<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'payment_method';

    public $guarded = ['id'];

    protected $fillable = ['name', 'brand', 'last_four', 'exp_month', 'exp_year', 'primary', 'external_id'];

}

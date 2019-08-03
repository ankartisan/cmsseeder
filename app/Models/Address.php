<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    const TYPE_BILLING = 1;
    const TYPE_DELIVERY = 2;
    const TYPE_BILLING_DELIVERY = 3;

    protected $table = 'addresses';

    public $guarded = ['id'];

    protected $fillable = ['first_name', 'last_name', 'address', 'apt', 'zip', 'city', 'state_id', 'country_id', 'type_id', 'note'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}

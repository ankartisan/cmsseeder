<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATUS_CREATED = 1;

    protected $table = "orders";

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
        'status_id',
        'cart_id',
        'number',
        'price'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function getStatusAttribute()
    {
        $statuses = [
            self::STATUS_CREATED => "Created",
        ];

        return $statuses[$this->status_id];
    }
    /**
     *  Generate unique reference number
     */
    public function generateUniqueNumber()
    {
        return time() . $this->customer->id . $this->id;
    }

    public static function search($request)
    {
        $query = (new Order())->newQuery();
        $query->select('orders.*');
        $query->leftJoin('customers', 'customers.id', '=', 'orders.customer_id');

        if($request->has('search')) {
            $search = $request->get('search');

            $query->where(function ($query) use ($search) {
                $query->where('orders.id', 'LIKE', '%'.$search.'%');
                $query->orWhere('orders.number', 'LIKE', '%'.$search.'%');
                $query->orWhere('customers.first_name', 'LIKE', '%'.$search.'%');
                $query->orWhere('customers.last_name', 'LIKE', '%'.$search.'%');
            });
        }

        if($request->has('sort')) {
            $query->orderBy('orders.'.$request->get('sort'), $request->get('order'));
        } else {
            $query->orderBy('orders.created_at', 'desc');
        }

        $query->distinct();

        return $query->paginate();
    }

}

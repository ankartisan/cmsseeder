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
        'user_id',
        'status_id',
        'cart_id',
        'hash',
        'price'
    ];

    public function products()
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }

    public function getStatusAttribute()
    {
        $statuses = [
            self::STATUS_CREATED => "Created",
        ];

        return $statuses[$this->status_id];
    }

    public static function search($request)
    {
        $query = (new Order())->newQuery();
        $query->select('orders.*');

        if($request->has('search')) {
            $search = $request->get('search');

            $query->where(function ($query) use ($search) {
                $query->where('orders.id', 'LIKE', '%'.$search.'%');
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

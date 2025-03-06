<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $fillable = [
        'name',
        'address',
        'city',
        'country',
        'phone',
        'email',
        'status',
        'total',
        'additional_information',
        'user_id',
        'shipping_status',
        'order_number',
        'shipping'
    ];

    public function orderItem() {
        return $this->hasMany(OrderItem::class);
    }
}

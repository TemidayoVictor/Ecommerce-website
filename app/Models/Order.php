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
        'shipping',
        'delivery_location_id',
        'coupon_id',
    ];

    public function orderItem() {
        return $this->hasMany(OrderItem::class);
    }

    public function coupon() {
        return $this->hasMany(Coupon::class);
    }

    public function deliverylocation() {
        return $this->hasMany(DeliveryLocation::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryLocation extends Model
{
    //
    protected $table = 'delivery_locations';
    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    public function order() {
        return $this->belongsTo(Order::class);
    }
}

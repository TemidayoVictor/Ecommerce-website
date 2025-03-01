<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAddition extends Model
{
    //
    protected $table = 'product_additions';
    protected $fillable = [
        'product_id',
        'name',
        'value'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}

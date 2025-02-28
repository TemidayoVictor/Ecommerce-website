<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'price',
        'description',
        'sales',
        'stock',
    ];
}

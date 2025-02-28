<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $table = 'brands';
    protected $fillable = [
        'category_id',
        'name',
        'status',
    ];
}

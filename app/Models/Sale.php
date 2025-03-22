<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    protected $table = 'sales';
    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'start_time',
        'end_time',
        'discount',
        'discount_type',
        'revenue',
        'status',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }
}

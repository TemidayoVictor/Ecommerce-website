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

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function productImage() {
        return $this->hasMany(ProductImage::class);
    }

    public function productAddition() {
        return $this->hasMany(ProductAddition::class);
    }

    public function brand()
{
    return $this->belongsTo(Brand::class);
}

}

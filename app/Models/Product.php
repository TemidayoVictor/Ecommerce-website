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
        'featured',
        'status',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function productImage() {
        return $this->hasMany(ProductImage::class);
    }

    public function productAddition() {
        return $this->hasMany(ProductAddition::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    // Get the average rating (returns 0 if no reviews)
    public function getAverageRatingAttribute()
    {
        return round($this->reviews()->where('approved', true)->avg('rating')) ?? 0;
    }
    

}

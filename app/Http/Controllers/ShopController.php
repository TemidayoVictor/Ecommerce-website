<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ShopController extends Controller
{
    public function shop(Request $request)
    {
        $products = Product::all(); // Or add pagination/filters as needed

        $query = Product::query();

        // Log the received filters
        Log::info('Filtering products', [
        'category' => $request->category,
        'brand' => $request->brand,
        'sort' => $request->sort
    ]);

    // Filtering by category
    if ($request->has('category') && !empty($request->category)) {
        $query->where('category_id', $request->category);
    }

    // Filtering by brand
    if ($request->has('brand') && !empty($request->brand)) {
        $query->where('brand_id', $request->brand);
    }

    // Sorting
    if ($request->has('sort')) {
        switch ($request->sort) {
            case 'price_low_high':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high_low':
                $query->orderBy('price', 'desc');
                break;
            case 'latest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
        }
    }

    // Fetch products after applying filters
    $products = $query->paginate(12); // 12 products per page

    // Fetch categories and brands for the filter options
    $categories = Category::all();
    $brands = Brand::all();

    return view('shop', compact('products', 'categories', 'brands'));

    }
}

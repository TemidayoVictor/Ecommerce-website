<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function shop()
    {
        $products = Product::all(); // Or add pagination/filters as needed
        return view('shop', compact('products'));
    }
}

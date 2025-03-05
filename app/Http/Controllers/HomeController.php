<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Product model

class HomeController extends Controller
{
        public function index()
        {
            // Retrieve all products (consider pagination for a large number of products)
            $products = Product::all(); // or Product::paginate(10);

            // Pass the products to your homepage view
            return view('index', compact('products'));
        }
 }

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

        public function search(Request $request) {
            $request->validate([
                'search' => 'required',
            ]);

            $search = $request->search;

            $products = Product::with('category', 'brand')
                ->where('name', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%")
                ->orWhereHas('category', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%$search%");
                })
                ->orWhereHas('brand', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%$search%");
                })
            ->get();

            return view('shop', [
                'products' => $products,
            ]);

        }
 }

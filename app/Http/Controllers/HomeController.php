<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Brand;

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve all products (consider pagination for a large number of products)
        $products = Product::all(); // or Product::paginate(10);

        $featuredProducts = Product::where('featured', 1)->latest()->limit(6)->get(); // Get latest 6 featured products

        // Retrieve products added in the last 7 days
        $newlyAddedProducts = Product::where('created_at', '>=', Carbon::now()->subDays(7))
        ->latest()
        ->limit(6)
        ->get();
        $newArrivalProducts = Product::where('created_at', '>=', Carbon::now()->subDays(7))
        ->latest()
        ->get();

        $categories = Category::all();

        $sale = Sale::where('status', 'running')->first();

        // Pass the products to your homepage view
        return view('index', compact('products', 'featuredProducts', 'newlyAddedProducts', 'newArrivalProducts', 'sale', 'categories'));
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

    public function getActiveSale()
    {
        $sale = Sale::where('status', 'running')->first();

        return response()->json([
            'sale' => $sale,
            'current_time' => now(),
        ]);
    }

    public function categoryProducts($id) {
        $category = Category::where('slug', $id)->first();
        if(!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }

        $brands = Brand::where('category_id', $category->id)->get();
        $products = Product::where('category_id', $category->id)->paginate(15);

        return view('shop-page', [
            'brands' => $brands,
            'products' => $products,
            'id' => $id,
        ]);
    }

    public function brandProducts($cat, $id) {
        $category = Category::where('slug', $cat)->first();
        if(!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }

        $brand = Brand::where('slug', $id)->first();
        if(!$brand) {
            return redirect()->back()->with('error', 'Brand not found.');
        }

        $brands = NULL;
        $products = Product::where('brand_id', $brand->id)->paginate(15);

        return view('shop-page', [
            'brands' => $brands,
            'products' => $products,
        ]);
    }
 }

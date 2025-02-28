<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{

    public function addProducts()
    {
        $pageTitle = 'Products';
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.add-products', [
            'pageTitle' => $pageTitle,
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }

    public function categories()
    {
        $pageTitle = 'Categories';
        return view('admin.products.category', [
            'pageTitle' => $pageTitle,
        ]);
    }

    public function addCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);

        $categoryName = $request->category_name;

        $check = Category::where('name', $categoryName)->first();
        if($check) {
            return redirect()->back()->with('error', 'Category already exists');
        }

        else {
            $category = Category::create([
                'name' => $categoryName,
                'status' => 'Active',
            ]);

            return redirect()->back()->with('success', 'Category added successfully');
        }
    }

    public function brands()
    {
        $pageTitle = 'Brands';
        $categories = Category::all();
        return view('admin.products.brand', [
            'pageTitle' => $pageTitle,
            'categories' => $categories,
        ]);
    }

    public function addBrand(Request $request)
    {
        $request->validate([
            'brand_name' => 'required',
            'category' => 'required',
        ]);

        $brandName = $request->brand_name;
        $category = $request->category;

        $check = Brand::where('name', $brandName)->first();
        if($check) {
            return redirect()->back()->with('error', 'Brand already exists');
        }

        else {
            $brand = Brand::create([
                'name' => $brandName,
                'category_id' => $category,
                'status' => 'Active',
            ]);

            return redirect()->back()->with('success', 'Brand added successfully');
        }
    }
}

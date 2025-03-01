<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductImage;

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

    public function addProductPost(Request $request) {
        $request->validate([
            'category' => 'required',
            'brand',
            'product_name' => 'required',
            'product_description' => 'required',
            'price' => 'required',
            'sales',
            'stock' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        if(empty($request->sales)) {
            $sales = $request->price;
        } else {
            $sales = $request->sales;
        }

        $product = Product::create([
            'category_id' => $request->category,
            'brand_id' => $request->brand,
            'name' => $request->product_name,
            'price' => $request->price,
            'description' => $request->product_description,
            'sales' => $sales,
            'stock' => $request->stock,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // generate a unique name
                $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();

                $filename = $originalName . '_' . time() . '.' . $extension;

                // Save to storage
                $imagePath = $image->storeAs('uploads', $filename, 'public');

                // Save to database
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $imagePath,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Product added successfully');
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

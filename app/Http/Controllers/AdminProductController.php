<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductImage;
use App\Models\ProductAddition;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{

    public function index() {
        $pageTitle = "All Products";
        $products = Product::with('productImage', 'category')->orderBy('id', 'desc') ->get();
        return view('admin.products.index', [
            'pageTitle' => $pageTitle,
            'products' => $products,
        ]);
    }

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
            'extra_fields' => 'nullable|array'
        ]);

        if(empty($request->sales)) {
            $sales = $request->price;
        } else {
            $sales = $request->sales;
        }

        $featured = $request->has('featured') ? 1 : 0;


        $product = Product::create([
            'category_id' => $request->category,
            'brand_id' => $request->brand,
            'name' => $request->product_name,
            'price' => $request->price,
            'description' => $request->product_description,
            'sales' => $sales,
            'stock' => $request->stock,
            'featured' => $featured,
        ]);

        // store images

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

        // store extra fields if present

        if (!empty($request->extra_fields)) {
            foreach ($request->extra_fields as $field) {
                if(!empty($field['name']) && !empty($field['value'])) {
                    ProductAddition::create([
                        'product_id' => $product->id,
                        'name' => $field['name'],
                        'value' => $field['value'],
                    ]);
                }
            }
        }

        return redirect()->route('admin.products')->with('success', "Product added successfully");
    }

    public function editProduct($id) {
        $pageTitle = "Edit Product";
        $product = Product::where('id', $id)->with('productImage', 'category', 'productAddition')->first();
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.edit', [
            'pageTitle' => $pageTitle,
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands,
        ]);

    }

    public function editProductPost(Request $request, $id) {
        $request->validate([
            'category' => 'required',
            'brand',
            'product_name' => 'required',
            'product_description' => 'required',
            'price' => 'required',
            'sales',
            'stock' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'extra_fields' => 'nullable|array'
        ]);

        if(empty($request->sales)) {
            $sales = $request->price;
        } else {
            $sales = $request->sales;
        }

        $featured = $request->has('featured') ? 1 : 0;

        // update products
        Product::where('id', $id)->update([
            'category_id' => $request->category,
            'brand_id' => $request->brand,
            'name' => $request->product_name,
            'price' => $request->price,
            'description' => $request->product_description,
            'sales' => $sales,
            'stock' => $request->stock,
            'featured' => $featured,
        ]);

        // store images

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
                    'product_id' => $id,
                    'image' => $imagePath,
                ]);
            }
        }

        // store extra fields if present

        if (!empty($request->extra_fields)) {
            foreach ($request->extra_fields as $field) {
                if(!empty($field['name']) && !empty($field['value'])) {
                    ProductAddition::create([
                        'product_id' => $id,
                        'name' => $field['name'],
                        'value' => $field['value'],
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Product edited successfully');
    }

    public function deleteProduct(Request $request, $id) {
        $product = Product::with('productImage', 'productAddition')->find($id);

        if ($product) {

            // delete product images
            $productImages = $product->productImage;
            if(count($productImages) > 0) {
                foreach($productImages as $productImage) {
                    $imagePath = public_path('uploads/' . $productImage->image); // Adjust path as needed
                    // Check if file exists, then delete it
                    if (file_exists($imagePath) && is_file($imagePath)) {
                        Storage::delete('public/uploads/' . $productImage->image);
                    }
                    // Delete the database record
                    $productImage->delete();
                }
            }

            // delete product additions
            $productAdditions = $product->productAddition;
            if(count($productAdditions) > 0) {
                foreach($productAdditions as $productAddition) {
                    $productAddition->delete();
                }
            }

            // delete product row
            $product->delete();

            return redirect()->back()->with('success', 'Product deleted successfully.');
        }

        return redirect()->back()->with('error', 'Product not found.');
    }

    public function categories()
    {
        $pageTitle = 'Categories';
        $categories = Category::all();
        return view('admin.products.category', [
            'pageTitle' => $pageTitle,
            'categories' => $categories
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
        $brands = Brand::with('category')->get();
        return view('admin.products.brand', [
            'pageTitle' => $pageTitle,
            'categories' => $categories,
            'brands' => $brands,
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

    public function deleteImage(Request $request, $id) {
        $productImage = ProductImage::find($id);

        if ($productImage) {
            // Get the image path
            $imagePath = public_path('uploads/' . $productImage->image); // Adjust path as needed

            // Check if file exists, then delete it
            if (file_exists($imagePath) && is_file($imagePath)) {
                Storage::delete('public/uploads/' . $productImage->image);
            }

            // Delete the database record
            $productImage->delete();

            return redirect()->back()->with('success', 'Image deleted successfully.');
        }

        return redirect()->back()->with('error', 'Image not found.');
    }

    public function deleteAddition(Request $request, $id) {
        $productAddition = ProductAddition::find($id);
        if ($productAddition) {
            $productAddition->delete();
            return redirect()->back()->with('success', 'Field deleted Successfully');
        }

        else {
            return redirect()->back()->with('error', 'Field not found');
        }
    }

    public function show($id)
{
    $product = Product::with('productImage', 'brand', 'category')->findOrFail($id);

    // Fetch related products (same category, exclude current product)
    $relatedProducts = Product::where('category_id', $product->category_id)
                              ->where('id', '!=', $product->id)
                              ->latest()
                              ->limit(6) // Show only 6 related products
                              ->get();

    return view('details', compact('product', 'relatedProducts'));
}


}

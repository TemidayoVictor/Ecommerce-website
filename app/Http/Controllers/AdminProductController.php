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
        $products = Product::with('productImage', 'category')->orderBy('id', 'desc')->where('type', NULL)->get();
        return view('admin.products.index', [
            'pageTitle' => $pageTitle,
            'products' => $products,
        ]);
    }

    public function addProducts()
    {
        $pageTitle = 'Products';
        $kitchenCheck = Category::where('name', 'Kitchen')->first();
        if($kitchenCheck) {
            $categories = Category::where('id', '!=', $kitchenCheck->id)->get();
            $brands = Brand::where('category_id', '!=', $kitchenCheck->id)->get();
        }

        else {
            $categories = Category::all();
            $brands = Brand::all();
        }
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
            'extra_fields' => 'nullable|array',
            'type',
        ]);

        if(empty($request->sales)) {
            $sales = $request->price;
        } else {
            $sales = $request->sales;
        }

        $featured = $request->has('featured') ? 1 : 0;

        if(!empty($request->type)) {
            $type = $request->type;
        } else {
            $type = NULL;
        }

        $product = Product::create([
            'category_id' => $request->category,
            'brand_id' => $request->brand,
            'name' => $request->product_name,
            'price' => $request->price,
            'description' => $request->product_description,
            'sales' => $sales,
            'stock' => $request->stock,
            'featured' => $featured,
            'type' => $type,
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
            'image' => 'required',
        ]);

        $categoryName = $request->category_name;
        $formattedName = strtolower(str_replace(' ', '-', $categoryName));

        $check = Category::where('name', $categoryName)->first();
        if($check) {
            return redirect()->back()->with('error', 'Category already exists');
        }

        $image = $request->image;

        // generate a unique name
        $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $image->getClientOriginalExtension();

        $filename = $originalName . '_' . time() . '.' . $extension;

        // Save to storage
        $imagePath = $image->storeAs('uploads', $filename, 'public');

        $category = Category::create([
            'name' => $categoryName,
            'status' => 'Active',
            'slug' => $formattedName,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Category added successfully');

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
        $formattedName = strtolower(str_replace(' ', '-', $brandName));

        $check = Brand::where('name', $brandName)->where('category_id', $category)->first();
        if($check) {
            return redirect()->back()->with('error', 'Brand already exists');
        }

        $image = $request->image;

        // generate a unique name
        $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $image->getClientOriginalExtension();

        $filename = $originalName . '_' . time() . '.' . $extension;

        // Save to storage
        $imagePath = $image->storeAs('uploads', $filename, 'public');

        $brand = Brand::create([
            'name' => $brandName,
            'category_id' => $category,
            'status' => 'Active',
            'slug' => $formattedName,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Brand added successfully');
    }

    public function getBrands($id) {
        return response()->json(Brand::where('category_id', $id)->get());
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

        $product = Product::with(['reviews' => function ($query) {
            $query->where('approved', true);
        }])->find($id);

        if (!$product) {
            return redirect()->route('shop')->with('error', 'Product not found.');
        }

        // Fetch related products (same category, exclude current product)
        $relatedProducts = Product::where('category_id', $product->category_id)
                                ->where('id', '!=', $product->id)
                                ->latest()
                                ->limit(6) // Show only 6 related products
                                ->get();

        return view('details', compact('product', 'relatedProducts'));
    }

    public function kitchen() {
        $pageTitle = "Kitchen";
        $products = Product::with('productImage', 'category')->orderBy('id', 'desc')->where('type', 'kitchen')->get();
        return view('admin.products.index', [
            'pageTitle' => $pageTitle,
            'products' => $products,
        ]);
    }

    public function addKitchen() {
        $pageTitle = "Add Kitchen Item";
        // check if kitchen category exists, else create it
        $kitchenCheck = Category::where('name', 'Kitchen')->first();

        if(!$kitchenCheck) {
            $kitchen = Category::create([
                'name' => 'Kitchen',
                'status' => 'Active',
                'image' => 'uploads/food.jpeg',
            ]);

            // create sub category (brands)
            $brand = Brand::create([
                'name' => 'Breakfast',
                'category_id' => $kitchen->id,
                'status' => 'Active',
            ]);

            $brand = Brand::create([
                'name' => 'Lunch',
                'category_id' => $kitchen->id,
                'status' => 'Active',
            ]);

            $brand = Brand::create([
                'name' => 'Dinner',
                'category_id' => $kitchen->id,
                'status' => 'Active',
            ]);
        }

        else {
            $kitchen = $kitchenCheck;
        }

        $brands = Brand::where('category_id', $kitchen->id)->get();

        return view('admin.products.add-products', [
            'pageTitle' => $pageTitle,
            'kitchen' => $kitchen,
            'brands' => $brands,
        ]);
    }

    public function editKitchen($id) {
        $pageTitle = "Kitchen Item";
        $product = Product::where('id', $id)->with('productImage', 'category', 'productAddition')->first();
        $category = Category::where('name','kitchen')->first();
        $brands = Brand::where('category_id', $category->id)->get();
        return view('admin.products.edit', [
            'pageTitle' => $pageTitle,
            'product' => $product,
            'brands' => $brands,
            'category' => $category,
        ]);

    }


}

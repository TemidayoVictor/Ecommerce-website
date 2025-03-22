<?php

namespace App\Http\Controllers;

use App\Models\DeliveryLocation;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    //
    public function index() {
        $pageTitle = "Settings";
        $deliveryLocations = DeliveryLocation::all();
        return view('admin.settings.index', [
            'pageTitle' => $pageTitle,
            'deliveryLocations' => $deliveryLocations,
            'type' => 'add',
        ]);
    }

    public function addLocation(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        // create location
        $location = DeliveryLocation::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Location Added Successfully');
    }

    public function editLocation($id) {
        $pageTitle = "Settings";
        $deliveryLocations = DeliveryLocation::all();
        $location = DeliveryLocation::findorFail($id);
        return view('admin.settings.index', [
            'pageTitle' => $pageTitle,
            'deliveryLocations' => $deliveryLocations,
            'type' => 'edit',
            'location' => $location,
        ]);
    }

    public function editLocationPost(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $location = DeliveryLocation::findorFail($id);

        // edit location
        $location->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Location Updated Successfully');
    }

    public function deleteLocation(Request $request, $id) {
        $location = DeliveryLocation::findorFail($id);

        // Delete the database record
        $location->delete();

        return redirect()->back()->with('success', 'Location Deleted Successfully');
    }

    public function generateCoupon() {
        $pageTitle = "Generate Coupon";
        $coupons = Coupon::all();
        return view('admin.settings.coupon', [
            'pageTitle' => $pageTitle,
            'coupons' => $coupons,
        ]);
    }

    public function generateCouponPost(Request $request) {
        $request->validate([
            'type' => 'required',
            'discount' => 'required',
            'usage_limit' => 'required',
            'expires_at' => 'required',
            'amount',
        ]);

        if(empty($request->amount)) {
            $amount = 1;
        }

        elseif($request->amount < 1) {
            return redirect()->back()->with('error', 'Amount cannot be less than 1');
        }

        else {
            $amount = $request->amount;
        }

        for ($i = 1; $i <= $amount; $i++) {
            $code = $this->generateCode();
            $coupon = Coupon::create([
                'code' => $code,
                'type' => $request->type,
                'discount' => $request->discount,
                'usage_limit' => $request->usage_limit,
                'expires_at' => Carbon::parse($request->expires_at)->format('Y-m-d'),
            ]);
        }

        return redirect()->back()->with('success', 'Coupon codes generated Successfully');
    }

    public function createSales() {
        $pageTitle = "Sales";

        $categories = Category::all();
        $brands = Brand::all();

        $onSale = false;
        $sale = null;

        $check = Sale::where('status', 'running')->with('category', 'brand')->first();
        if($check) {
            $onSale = true;
            $sale = $check;
        }

        $sales = Sale::all();

        return view('admin.settings.sales', [
            'pageTitle' => $pageTitle,
            'categories' => $categories,
            'brands' => $brands,
            'onSale' => $onSale,
            'sale' => $sale,
            'sales' => $sales,
        ]);
    }

    public function createSalesPost(Request $request) {
        $request->validate([
            'name' => 'required',
            'start' => 'required',
        ]);

        $category = $request->category;
        $brand = $request->brand;
        $type = $request->type;
        $discount = $request->discount;
        $start = $request->start;
        $end = $request->end;

        if($brand && $discount) {
            $products = Product::where('brand_id', $brand)->get();
            foreach($products as $product) {
                if($type == 'percentage') {
                    $discountedPrice = $product->price - ($product->price * $discount / 100);
                }

                else {
                    $discountedPrice = $product->price - $discount;
                }

                $product->update([
                    'sales' => $discountedPrice,
                    'status' => 'on_sale',
                ]);
            }
        }

        elseif($brand && !$discount) {
            $products = Product::where('brand_id', $brand)->get();
            foreach($products as $product) {
                $product->update([
                    'status' => 'on_sale',
                ]);
            }
        }

        elseif($category && $discount) {
            $products = Product::where('category_id', $category)->get();
            foreach($products as $product) {
                if($type == 'percentage') {
                    $discountedPrice = $product->price - ($product->price * $discount / 100);
                }

                else {
                    $discountedPrice = $product->price - $discount;
                }

                $product->update([
                    'sales' => $discountedPrice,
                    'status' => 'on_sale',
                ]);
            }
        }

        elseif($category && !$discount) {
            $products = Product::where('category_id', $category)->get();
            foreach($products as $product) {
                $product->update([
                    'status' => 'on_sale',
                ]);
            }
        }

        elseif(!$category && !$brand && $discount) {
            $products = Product::all();
            foreach($products as $product) {
                if($type == 'percentage') {
                    $discountedPrice = $product->price - ($product->price * $discount / 100);
                }

                else {
                    $discountedPrice = $product->price - $discount;
                }

                $product->update([
                    'sales' => $discountedPrice,
                    'status' => 'on_sale',
                ]);
            }
        }

        else {
            $products = Product::all();
            foreach($products as $product) {
                $product->update([
                    'status' => 'on_sale',
                ]);
            }
        }

        if($start < Carbon::now()->format('Y-m-d')) {
            return redirect()->back()->with('error', 'Start date cannot be less than today');
        }

        elseif($end !== NULL && $end < $start) {
            return redirect()->back()->with('error', 'End date cannot be less than start date');
        }

        else {

            if($discount == NULL) {
                $discount = 0;
            }

            if(!$end) {
                $endTime = NULL;
            }

            else {
                $endTime = Carbon::parse($end)->format('Y-m-d');
            }

            $sale = Sale::create([
                'category_id' => $category,
                'brand_id' => $brand,
                'name' => $request->name,
                'start_time' => Carbon::parse($start)->format('Y-m-d'),
                'end_time' => $endTime,
                'discount' => $discount,
                'discount_type' => $type,
                'revenue' => 0,
                'status' => 'running',
            ]);

            return redirect()->back()->with('success', 'Sales Stared Successfully');
        }
    }

    public function endSales($id) {
        $sale = Sale::findorFail($id);
        $category = $sale->category_id;
        $brand = $sale->brand_id;

        if($brand) {
            $products = Product::where('brand_id', $brand)->get();
            foreach($products as $product) {
                $product->update([
                    'sales' => $product->price,
                    'status' => 'available',
                ]);
            }
        }

        elseif($category) {
            $products = Product::where('category_id', $category)->get();
            foreach($products as $product) {
                $product->update([
                    'sales' => $product->price,
                    'status' => 'available',
                ]);
            }
        }

        else {
            $products = Product::all();
            foreach($products as $product) {
                $product->update([
                    'sales' => $product->price,
                    'status' => 'available',
                ]);
            }
        }

        $sale->update([
            'status' => 'ended',
            'end_time' => Carbon::now()->format('Y-m-d'),
        ]);

        return redirect()->back()->with('success', 'Sales Ended Successfully');
    }

    public function updateSales(Request $request, $id) {
        $request->validate([
            'end' => 'required',
        ]);

        $sale = Sale::findorFail($id);
        $sale->update([
            'end_time' => $request->end,
        ]);

        return redirect()->back()->with('success', 'Sales Updated Successfully');

    }

    private function generateCode() {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $length = 8;
        return substr(str_shuffle($characters), 0, $length);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\DeliveryLocation;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\ShippingAddress;
use App\Models\Sale;

class OrderController extends Controller
{
    //
    public function index() {
        $cartItem = session('cart', []);
        $total = 0;
        $shipping = 0;
        $location = Session::get('delivery_location');
        $coupon = Session::get('coupon');
        $check = false;
        if($location) {
            $shipping = $location['price'];
        }

        if(count($cartItem) > 0){
            foreach($cartItem as $item) {
                $lineTotal = $item['price'] * $item['quantity'];
                $total += $lineTotal;
            }
        }

        // check if user is logged in
        if (auth::check()) {
            $check = true;
            $user = auth()->user();
            $userId = $user->id;
            $addressCheck = ShippingAddress::where('user_id', $userId)->first();
            return view('checkout', [
                'cartItem' => $cartItem,
                'total' => $total,
                'shipping' => $shipping,
                'coupon' => $coupon,
                'check' => $check,
                'addressCheck' => $addressCheck,
                'user' => $user,
            ]);
        }

        else {
            return view('checkout', [
                'cartItem' => $cartItem,
                'total' => $total,
                'shipping' => $shipping,
                'coupon' => $coupon,
                'check' => $check
            ]);
        }
    }

    // Fetch all delivery locations
    public function getLocations()
    {
        return response()->json(DeliveryLocation::all());
    }

    // Save selected delivery location to session
    public function saveLocation(Request $request)
    {
        $request->validate([
            'location_id' => 'required',
        ]);

        $location = DeliveryLocation::findOrFail($request->location_id);

        Session::put('delivery_location', [
            'id' => $location->id,
            'name' => $location->name,
            'price' => $location->price
        ]);

        return response()->json(['message' => 'Delivery location saved successfully']);
    }

    public function placeOrder(Request $request) {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'state' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'note',
        ]);

        $cartItem = session('cart', []);
        $total = 0;
        $salesTotal = 0;
        $shipping = 0;
        $deliveryLocationId = NULL;
        $couponId = NULL;
        $saleId = NULL;
        $location = Session::get('delivery_location');
        $coupon = Session::get('coupon');
        if($location) {
            $shipping = $location['price'];
            $deliveryLocationId = $location['id'];
        }

        if(count($cartItem) <= 0) {
            return redirect()->back()->with('error', 'Kindly add Items to your cart');
        }

        if(count($cartItem) > 0){
            foreach($cartItem as $item) {
                $lineTotal = $item['price'] * $item['quantity'];
                $total += $lineTotal;
                if($item['sales']) {
                    $salesTotal += $lineTotal;
                }
            }
        }

        if($coupon) {
            $couponId = $coupon->id;
        }

        $note = "NULL";
        if(!empty($request->note)) {
            $note = $request->note;
        }

        $userId = NULL;
        // if user is signed in, update the user id
        if(auth()->user()) {
            $user = auth()->user();
            $userId = $user->id;

            // update shipping address
            ShippingAddress::updateOrCreate(
                ['user_id' => $userId],
                ['address_line1' => $request->address, 'city' => $request->city, 'state' => $request->state, 'country' => $request->country,]
            );
        }

        // check if any sale is currently ongoing
        $sale = Sale::where('status', 'running')->first();
        if($sale) {
            $saleId = $sale->id;
            $previousRevenue = $sale->revenue;
            $newRevenue = $previousRevenue + $salesTotal;
            $sale->update([
                'revenue' => $newRevenue
            ]);
        }

        $orderNumber = rand(100000000, 999999999);

        // update coupon status
        if($coupon) {
            $couponDetail = Coupon::findOrFail($coupon->id);
            $used = $couponDetail->used;
            $newUsed = $used + 1;
            $couponDetail->update([
                'used' => $newUsed,
            ]);
        }

        // create order
        $order = Order::create([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email,
            'status' => "Pending",
            'total' => $total,
            'additional_information' => $note,
            'user_id' => $userId,
            'shipping_status' => "Pending",
            'order_number' => $orderNumber,
            'shipping' => $shipping,
            'delivery_location_id' => $deliveryLocationId,
            'coupon_id' => $couponId,
            'sale_id' => $saleId,
            'sale_revenue' => $salesTotal,
        ]);

        // add each item in the cart to he database
        foreach($cartItem as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'amount' => $item['price'] * $item['quantity'],
            ]);
        }

        session()->forget('cart');
        Session::forget('delivery_location');
        Session::forget('coupon');
        return redirect()->route('order-details', ['id' => $order->id])->with('success', 'Your Order has been placed successfully');
    }

    public function details($id) {
        $order = Order::where('id', $id)->with('orderItem.product.productImage')->first();
        $coupon = NULL;
        if($order) {
            $pageTitle = "Order #".$order->order_number;
            $orderCoupon = $order->coupon_id;
            if($orderCoupon) {
                $coupon = Coupon::findOrFail($orderCoupon);
            }
            return view('order-details', [
                'pageTitle' => $pageTitle,
                'order' => $order,
                'coupon' => $coupon,
            ]);
        }

        else {
            return back()->with('error', 'Order not Found');
        }
    }

    public function applyCoupon(Request $request) {
        $request->validate([
            'coupon' => 'required',
        ]);

        $coupon = $request->coupon;
        $checkCoupon = Coupon::where('code', $coupon)->first();

        if($checkCoupon) {
            // check if coupon code is valid i.e. it has not yet been used or expired
            if($checkCoupon->isValid()) {
                // save coupon to session
                Session::put('coupon', $checkCoupon);
                return back()->with('success', 'Coupon added successfully');
            }
            else {
                return back()->with('error', 'Coupon can no longer be used');
            }
        }

        else {
            return back()->with('error', 'Invalid Coupon Code');
        }

    }

    public function removeCoupon(Request $request) {
        Session::forget('coupon');
        return back()->with('success', 'Coupon removed successfully');
    }
}

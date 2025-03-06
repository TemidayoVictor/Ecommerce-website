<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    //
    public function index() {
        $cartItem = session('cart', []);
        $total = 0;
        $shipping = 0;

        if(count($cartItem) > 0){
            foreach($cartItem as $item) {
                $lineTotal = $item['price'] * $item['quantity'];
                $total += $lineTotal;
            }
        }

        return view('checkout', [
            'cartItem' => $cartItem,
            'total' => $total,
            'shipping' => $shipping,
        ]);
    }

    public function placeOrder(Request $request) {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'note',
        ]);

        $cartItem = session('cart', []);
        $total = 0;
        $shipping = 0;

        if(count($cartItem) <= 0) {
            return redirect()->back()->with('error', 'Kindly add Items to your cart');
        }

        if(count($cartItem) > 0){
            foreach($cartItem as $item) {
                $lineTotal = $item['price'] * $item['quantity'];
                $total += $lineTotal;
            }
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
        }

        $orderNumber = rand(100000000, 999999999);

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
        return redirect()->route('order-details', ['id' => $order->id])->with('success', 'Your Order has been placed successfully');
    }

    public function details($id) {
        $order = Order::where('id', $id)->with('orderItem.product.productImage')->first();
        if($order) {
            $pageTitle = "Order #".$order->order_number;
            return view('order-details', [
                'pageTitle' => $pageTitle,
                'order' => $order,
            ]);
        }

        else {
            return back()->with('error', 'Order not Found');
        }
    }
}

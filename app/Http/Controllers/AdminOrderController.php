<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\DeliveryLocation;
use App\Models\User;
use App\Models\Coupon;

class AdminOrderController extends Controller
{
    //
    public function index() {
        $pageTitle = "All Orders";
        $orders = Order::orderBy('id', 'desc')->get();
        return view('admin.orders.index', [
            'pageTitle' => $pageTitle,
            'orders' => $orders,
        ]);
    }

    public function show($id) {
        $order = Order::where('id', $id)->with('orderItem.product.productImage')->first();
        if($order) {
            $pageTitle = "Order #".$order->order_number;
            return view('admin.orders.show', [
                'pageTitle' => $pageTitle,
                'order' => $order,
            ]);
        }

        else {
            return redirect()->route('admin.orders')->with('error', 'Order not Found');
        }
    }

    public function updatePayment(Request $request, $id) {
        $request->validate([
            'status' => 'required',
        ]);

        $order = Order::where('id', $id)->first();
        if($order) {
            $status = $request->status;
            Order::where('id', $id)->update([
                'status' => $status,
            ]);

            return back()->with('success', 'Order updated successfully');
        }

        else {
            return redirect()->route('admin.orders')->with('error', 'Order not Found');
        }
    }

    public function updateShipping(Request $request, $id) {
        $request->validate([
            'status' => 'required',
        ]);

        $order = Order::where('id', $id)->first();
        if($order) {
            $status = $request->status;
            Order::where('id', $id)->update([
                'shipping_status' => $status,
            ]);

            return back()->with('success', 'Order updated successfully');
        }

        else {
            return redirect()->route('admin.orders')->with('error', 'Order not Found');
        }
    }

    public function userOrders($id) {
        $user = User::findOrFail($id);
        $pageTitle = "Orders";
        $orders = Order::where('user_id', $id)->orderBy('id', 'desc')->get();
        return view('admin.orders.index', [
            'pageTitle' => $pageTitle,
            'orders' => $orders,
        ]);
    }

    public function couponOrders($id) {
        $coupon = Coupon::findOrFail($id);
        $pageTitle = "Orders";
        $orders = Order::where('coupon_id', $id)->orderBy('id', 'desc')->get();
        return view('admin.orders.index', [
            'pageTitle' => $pageTitle,
            'orders' => $orders,
        ]);
    }

    public function pendingOrders() {
        $pageTitle = "Pending Orders";
        $orders = Order::where('status', 'Pending')->orderBy('id', 'desc')->get();
        return view('admin.orders.index', [
            'pageTitle' => $pageTitle,
            'orders' => $orders,
        ]);
    }

    public function unfulfilledOrders() {
        $pageTitle = "Unfulfilled Orders";
        $orders = Order::where('shipping_status', 'Pending')->orderBy('id', 'desc')->get();
        return view('admin.orders.index', [
            'pageTitle' => $pageTitle,
            'orders' => $orders,
        ]);
    }
}

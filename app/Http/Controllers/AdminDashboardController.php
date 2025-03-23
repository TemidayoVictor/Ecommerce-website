<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    public function index() {
        $pageTitle = "Dashboard";
        $users = User::where('is_admin', 0)->count();

        $month = Carbon::now()->month;
        $year = Carbon::now()->year;

        $stats = OrderItem::whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->selectRaw('SUM(quantity) as total_products, SUM(amount) as total_revenue')
            ->first();

        $totalProducts = $stats->total_products ?? 0;
        $totalRevenue = $stats->total_revenue ?? 0;

        $pendingOrders = Order::where('status', 'Pending')->count();
        $unfulilledfOrders = Order::where('shipping_status', 'Pending' )->count();

        return view('admin.index', [
            'pageTitle' => $pageTitle,
            'users' => $users,
            'totalProducts' => $totalProducts,
            'totalRevenue' => $totalRevenue,
            'pendingOrders' => $pendingOrders,
            'unfulilledfOrders' => $unfulilledfOrders,
        ]);
    }
}

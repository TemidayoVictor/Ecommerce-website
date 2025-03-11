<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OrderController;

// Admin routes (Will be put in middleware later)
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    // Products
    Route::get('/products', [AdminProductController::class, 'index'])->name('products');

    Route::get('/add-products', [AdminProductController::class, 'addProducts'])->name('add-products');
    Route::post('/add-products', [AdminProductController::class, 'addProductPost']);

    Route::get('/edit-product/{id}', [AdminProductController::class, 'editProduct'])->name('edit-products');
    Route::post('/edit-product/{id}', [AdminProductController::class, 'editProductPost']);

    Route::post('/delete-product/{id}', [AdminProductController::class, 'deleteProduct'])->name('delete-product');

    // Categories
    Route::get('/categories', [AdminProductController::class, 'categories'])->name('categories');
    Route::post('/categories', [AdminProductController::class, 'addCategory']);

    // Brands
    Route::get('/brands', [AdminProductController::class, 'brands'])->name('brands');
    Route::post('/brands', [AdminProductController::class, 'addBrand']);

    // Product Images
    Route::post('/delete-image/{id}', [AdminProductController::class, 'deleteImage'])->name('delete-image');

    // Product Additions
    Route::post('/delete-addition/{id}', [AdminProductController::class, 'deleteAddition'])->name('delete-addition');

    // Orders
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders');
    Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('order.show');

    Route::post('/update-payment/{id}', [AdminOrderController::class, 'updatePayment'])->name('update-payment');
    Route::post('/update-shipping/{id}', [AdminOrderController::class, 'updateShipping'])->name('update-shipping');

});

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/shop', [ShopController::class, 'shop'])->name('shop');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

Route::delete('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');

// Route::patch('/cart/update-all', [CartController::class, 'updateAll'])->name('cart.updateAll');

Route::patch('/cart/update-all', [CartController::class, 'updateAll'])->name('cart.updateAll');


// Display wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index')->middleware('auth');

// Add product to wishlist (can be POST)
Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add');//->middleware('auth');

// Remove product from wishlist (you can use DELETE, here we use GET or POST for simplicity)
Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');//->middleware('auth');

Route::get('/product/{id}', [AdminProductController::class, 'show'])->name('product.show');

// checkout
Route::get('/checkout', [OrderController::class, 'index'])->name('place-order');
Route::post('/checkout', [OrderController::class, 'placeOrder']);

// checkout -success
Route::get('/order/{id}', [OrderController::class, 'details'])->name('order-details');

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/compare', function () {
    return view('compare');
});

Route::get('/account', function () {
    return view('account');
});

Route::get('/wishlist', function () {
    return view('wishlist');
});

Route::get('/details', function () {
    return view('details');
});

Route::get('/admin/dashboard', function () {
    return view('admin.index');
});

Route::get('/home', function () {
    return view('welcome');
});

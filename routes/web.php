<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OrderController;

// Admin routes (Will be put in middleware later)
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    // Products
    Route::get('/products', [ProductController::class, 'index'])->name('products');

    Route::get('/add-products', [ProductController::class, 'addProducts'])->name('add-products');
    Route::post('/add-products', [ProductController::class, 'addProductPost']);

    Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit-products');
    Route::post('/edit-product/{id}', [ProductController::class, 'editProductPost']);

    Route::post('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('delete-product');

    // Categories
    Route::get('/categories', [ProductController::class, 'categories'])->name('categories');
    Route::post('/categories', [ProductController::class, 'addCategory']);

    // Brands
    Route::get('/brands', [ProductController::class, 'brands'])->name('brands');
    Route::post('/brands', [ProductController::class, 'addBrand']);

    // Product Images
    Route::post('/delete-image/{id}', [ProductController::class, 'deleteImage'])->name('delete-image');

    // Product Additions
    Route::post('/delete-addition/{id}', [ProductController::class, 'deleteAddition'])->name('delete-addition');
});

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/shop', [ShopController::class, 'shop'])->name('shop');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

Route::delete('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');

Route::patch('/cart/update-all', [CartController::class, 'updateAll'])->name('cart.updateAll');

// Display wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index')->middleware('auth');

// Add product to wishlist (can be POST)
Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add');//->middleware('auth');

// Remove product from wishlist (you can use DELETE, here we use GET or POST for simplicity)
Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');//->middleware('auth');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/checkout', [OrderController::class, 'index'])->name('place-order');
Route::post('/checkout', [OrderController::class, 'placeOrder']);

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

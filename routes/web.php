<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


// Admin routes (Will be put in middleware later)
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/add-products', [ProductController::class, 'addProducts'])->name('add-products');
    Route::post('/add-products', [ProductController::class, 'addProductPost']);

    // Categories
    Route::get('/categories', [ProductController::class, 'categories'])->name('categories');
    Route::post('/categories', [ProductController::class, 'addCategory']);

    // Brands
    Route::get('/brands', [ProductController::class, 'brands'])->name('brands');
    Route::post('/brands', [ProductController::class, 'addBrand']);
});

Route::get('/', function () {
    return view('index');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/checkout', function () {
    return view('checkout');
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

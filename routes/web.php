<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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

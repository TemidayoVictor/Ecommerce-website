<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;


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

// General Routes
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/search', [HomeController::class, 'search'])->name('search');

Route::get('/shop', [ShopController::class, 'shop'])->name('shop');

Route::get('/product/{id}', [AdminProductController::class, 'show'])->name('product.show');

// cart
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');

// Wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index')->middleware('auth');
Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add')->middleware('auth');
Route::post('/wishlist/remove', [WishlistController::class, 'remove'])->name('wishlist.remove')->middleware('auth');
Route::get('/wishlist/count', [WishlistController::class, 'count'])->name('wishlist.count')->middleware('auth');

// checkout
Route::get('/checkout', [OrderController::class, 'index'])->name('place-order');
Route::post('/checkout', [OrderController::class, 'placeOrder']);
Route::get('/order/{id}', [OrderController::class, 'details'])->name('order-details');

// GET route for displaying the combined login/register page
Route::get('/login', [AuthController::class, 'showCombinedForm'])->name('login');

// POST route for login submission
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// POST route for registration submission
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/account', [AccountController::class, 'index'])
    ->name('account')
    ->middleware('auth');

Route::get('/cart', function () {
    return view('cart');
});


Route::get('/compare', function () {
    return view('compare');
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

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ShippingAddressController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ReviewController;


// Admin routes (Will be put in middleware later)
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {

    // dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

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
    Route::get('/get-brands/{id}', [AdminProductController::class, 'getBrands'])->name('get-brands');

    // Product Images
    Route::post('/delete-image/{id}', [AdminProductController::class, 'deleteImage'])->name('delete-image');

    // Product Additions
    Route::post('/delete-addition/{id}', [AdminProductController::class, 'deleteAddition'])->name('delete-addition');

    // Orders
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders');
    Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('order.show');

    Route::post('/update-payment/{id}', [AdminOrderController::class, 'updatePayment'])->name('update-payment');
    Route::post('/update-shipping/{id}', [AdminOrderController::class, 'updateShipping'])->name('update-shipping');

    Route::get('/user/orders/{id}', [AdminOrderController::class, 'userOrders'])->name('order-user');

    //Admin User Management

    //     Route::middleware(['auth', 'admin'])->group(function () {
    //     Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    // });

    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    // Settings
    // Delivery Location
    Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings');
    Route::post('/settings/add-delivery-location', [AdminSettingController::class, 'addLocation'])->name('settings.add-location');

    Route::get('/settings/edit-delivery-location/{id}', [AdminSettingController::class, 'editLocation'])->name('settings.edit-location');
    Route::post('/settings/edit-delivery-location/{id}', [AdminSettingController::class, 'editLocationPost']);

    Route::post('/settings/delete-delivery-location/{id}', [AdminSettingController::class, 'deleteLocation'])->name('settings.delete-location');

    // Sales
    Route::get('/settings/create-sales', [AdminSettingController::class, 'createSales'])->name('settings.create-sales');
    Route::post('/settings/create-sales', [AdminSettingController::class, 'createSalesPost']);
    Route::post('/settings/update-sales/{id}', [AdminSettingController::class, 'updateSales'])->name('settings.update-sales');
    Route::post('/settings/end-sales/{id}', [AdminSettingController::class, 'endSales'])->name('settings.end-sales');

    // Coupon
    Route::get('/settings/generate-coupon', [AdminSettingController::class, 'generateCoupon'])->name('settings.generate-coupon');
    Route::post('/settings/generate-coupon', [AdminSettingController::class, 'generateCouponPost']);
});

// General Routes
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/search', [HomeController::class, 'search'])->name('search');
Route::get('/api/get-active-sale', [HomeController::class, 'getActiveSale'])->name('get-active-sale');

Route::get('/shop', [ShopController::class, 'shop'])->name('shop');

Route::get('/product/{id}', [AdminProductController::class, 'show'])->name('product.show');

// cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');
Route::get('/cart/total', [CartController::class, 'getCartTotal'])->name('cart.total');

// Wishlist
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index')->middleware('auth');
Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add')->middleware('auth');
Route::post('/wishlist/remove', [WishlistController::class, 'remove'])->name('wishlist.remove')->middleware('auth');
Route::get('/wishlist/count', [WishlistController::class, 'count'])->name('wishlist.count')->middleware('auth');

// checkout
Route::get('/checkout', [OrderController::class, 'index'])->name('place-order');
Route::post('/checkout', [OrderController::class, 'placeOrder']);
Route::get('/order/{id}', [OrderController::class, 'details'])->name('order-details');

Route::get('/api/delivery-locations', [OrderController::class, 'getLocations']);
Route::post('/api/save-location', [OrderController::class, 'saveLocation']);

Route::post('/apply-coupon', [OrderController::class, 'applyCoupon'])->name('apply.coupon');

Route::post('/remove-coupon', [OrderController::class, 'removeCoupon'])->name('remove.coupon');

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

Route::post('/account/change-password', [AccountController::class, 'changePassword'])
    ->name('account.change-password')
    ->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::post('/account/shipping-address', [ShippingAddressController::class, 'store'])->name('account.shipping-address');
});

Route::middleware('auth')->group(function () {
    Route::post('/account/update-profile', [AccountController::class, 'updateProfile'])->name('account.updateProfile');
});

    // Forgot Password Form
Route::get('/forgot-password', [PasswordResetController::class, 'showForgotPasswordForm'])
->middleware('guest')
->name('password.request');

// Send Reset Link
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])
->middleware('guest')
->name('password.email');

// Password Reset Form
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])
->middleware('guest')
->name('password.reset');

// Handle Password Reset
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])
->middleware('guest')
->name('password.update');

Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Admin route to view newsletter subscribers
Route::get('/admin/newsletter', [NewsletterController::class, 'index'])->name('admin.newsletter');

Route::delete('/admin/newsletter/{id}', [NewsletterController::class, 'destroy'])->name('newsletter.delete');

Route::post('/product/{id}/review', [ReviewController::class, 'store'])->middleware('auth')->name('review.store');

// Admin routes for review approval
Route::middleware('auth')->group(function () {
    Route::get('/admin/reviews', [ReviewController::class, 'index'])->name('admin.reviews');
    Route::post('/admin/reviews/{id}/approve', [ReviewController::class, 'approve'])->name('admin.reviews.approve');
    Route::delete('/admin/reviews/{id}/delete', [ReviewController::class, 'destroy'])->name('admin.reviews.delete');
});

    Route::get('/compare', function () {
        return view('compare');
    });


Route::get('/details', function () {
    return view('details');
});

Route::get('/home', function () {
    return view('welcome');
});

<?php

use Illuminate\Support\Facades\Route;

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

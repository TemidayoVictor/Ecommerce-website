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

Route::get('/wishlist', function () {
    return view('wishlist');
});

Route::get('/details', function () {
    return view('details');
});


Route::get('/home', function () {
    return view('welcome');
});

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/details', function () {
    return view('details');
});


Route::get('/home', function () {
    return view('welcome');
});

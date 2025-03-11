<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function index()
    {
        // You can pass any user data if needed
        return view('account');
    }
}


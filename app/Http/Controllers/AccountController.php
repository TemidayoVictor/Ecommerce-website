<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    public function index()
    {
        // You can pass any user data if needed
        return view('account');
    }

    public function changePassword(Request $request)
{
    $request->validate([
        'current_password'      => 'required',
        'new_password'          => 'required|min:8|confirmed',
    ]);

    $user = Auth::user();

    // Check if the current password is correct
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Current password is incorrect']);
    }

    // Update the password
    $user->update([
        'password' => Hash::make($request->new_password),
    ]);

    return back()->with('success', 'Password updated successfully!');
}

}


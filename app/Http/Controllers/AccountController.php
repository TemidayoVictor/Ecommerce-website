<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Order;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{

    public function index()
    {
        $user = Auth::user(); // Get the logged-in user

        // Fetch wishlist items for the logged-in user
        $wishlistItems = Wishlist::where('user_id', $user->id)->with('product')->get();
        $address = $user->shippingAddress;

        // Fetch orders for the logged-in user
        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();


        return view('account', compact('wishlistItems', 'address', 'orders'));
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

public function updateProfile(Request $request)
{

    $user = Auth::user(); // Get logged-in user

    // Validate the request
    $request->validate([
        'name' => ['nullable', 'string', 'max:255'],
        'email' => [
            'nullable',
            'email:rfc,dns',
            'max:255',
            Rule::unique('users')->ignore($user->id),
        ],
    ]);

    // Update user details
    // Update only the fields that were submitted
    if ($request->filled('name')) {
        $existingName = \App\Models\User::where(DB::raw('LOWER(name)'), strtolower($request->name))
                                        ->where('id', '!=', $user->id)
                                        ->exists();
                                        
        if ($existingName) {
            return back()->with('error', 'The name is already taken.');
        }

        $user->name = $request->name; // Update name only if provided
    }

    if ($request->filled('email')) {
        $user->email = $request->email;
    }

    $user->update(); // Save changes

    return back()->with('success', 'Profile updated successfully!');
}

}


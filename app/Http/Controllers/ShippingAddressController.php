<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Auth;

class ShippingAddressController extends Controller
{
     public function index()
    {
        $address = Auth::user()->shippingAddress;
        return view('account', compact('address')); // Pass the address to the view
    }

    public function store(Request $request)
    {
        $request->validate([
            'address_line1' => 'required',
            'city'          => 'required',
            'state'         => 'required',
            'zipcode'       => 'required',
            'country'       => 'required',
        ]);

        ShippingAddress::updateOrCreate(
            ['user_id' => Auth::id()], // Ensure one address per user
            $request->all()
        );

        return back()->with('success', 'Shipping address updated successfully!');
    }
}

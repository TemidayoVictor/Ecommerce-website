<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Product;
    
class WishlistController extends Controller
{
    // Display the wishlist for the authenticated user
    public function index()
    {
        // Ensure the user is authenticated

            // $wishlistItems = Wishlist::with('product.productImage')
            // ->where('user_id', Auth::id())
            // ->get();

            $dummyUserId = 1;
            $wishlistItems = Wishlist::with('product.productImage')
            ->where('user_id', $dummyUserId)
            ->get();

        return view('wishlist', compact('wishlistItems'));
    }

    // Add a product to the wishlist
    public function add(Request $request)
    {
        // Make sure the user is authenticated
        if (!auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to add to your wishlist.');
        }

        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $productId = $request->input('product_id');
        $userId = auth::id();

        // Prevent duplicate wishlist entries
        $exists = Wishlist::where('user_id', $userId)
                          ->where('product_id', $productId)
                          ->exists();

        if (!$exists) {
            Wishlist::create([
                'user_id'    => $userId,
                'product_id' => $productId,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to wishlist!');
    }

    // Remove a product from the wishlist
    public function remove($id)
    {
        // $id is the wishlist record id
        $wishlistItem = Wishlist::findOrFail($id);

        // Ensure the user owns this wishlist item
        if ($wishlistItem->user_id != auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $wishlistItem->delete();
        return redirect()->back()->with('success', 'Product removed from wishlist.');
    }
}

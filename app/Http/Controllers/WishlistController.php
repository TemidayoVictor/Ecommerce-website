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
        // For a manual implementation, ensure you protect this route with auth middleware
        $wishlistItems = Wishlist::with('product.productImage')
            ->where('user_id', Auth::id())
            ->get();

        return view('wishlist', compact('wishlistItems'));
    }

    // Add a product to the wishlist
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
        ]);
    
        if (!auth::check()) {
            return response()->json(['error' => 'Please log in to add products to your wishlist.'], 401);
        }
    
        $userId = auth::id();
        $productId = $request->input('product_id');
    
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
    
        $newCount = Wishlist::where('user_id', $userId)->count();
    
        return response()->json([
            'message'  => 'Product added to wishlist successfully!',
            'wishlistCount' => $newCount,
        ]);
    }
    
    public function count()
    {
        $count = Wishlist::where('user_id', auth::id())->count();
        return response()->json(['wishlistCount' => $count]);
    }
    


    // Remove a product from the wishlist
    public function remove($id)
    {
        $wishlistItem = Wishlist::findOrFail($id);

        // Make sure the logged in user owns the wishlist item
        if ($wishlistItem->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $wishlistItem->delete();
        return redirect()->back()->with('success', 'Product removed from wishlist!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity'   => 'sometimes|integer|min:1'
        ]);
    
        $productId = $request->input('product_id');
        $quantity  = $request->input('quantity', 1);
    
        $cart = session()->get('cart', []);
    
        if(isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $product = Product::find($productId);
            // Get the image using the productImage relationship
            $image = $product->productImage->isNotEmpty() 
            ? $product->productImage->last()->image 
            : 'default.png'; // Optionally provide a default image if none exists

            $cart[$productId] = [
                "name"     => $product->name,
                "quantity" => $quantity,
                "description" => $product->description,
                "price"    => $product->price,
                "image"  => $image, 
            ];
        }
    
        session()->put('cart', $cart);
    
        return response()->json([
            'success' => 'Product added to cart successfully!'
        ]);
    }

    public function remove($productId)
{
    // Retrieve the current cart or an empty array if it doesn't exist
    $cart = session()->get('cart', []);

    // Check if the product exists in the cart
    if(isset($cart[$productId])) {
        // Remove the product from the cart
        unset($cart[$productId]);
        // Update the session with the new cart data
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Item removed from cart.');
    }

    return redirect()->back()->with('error', 'Item not found in cart.');
}

public function updateAll(Request $request)
{
    // The request's JSON payload is an object with product IDs as keys.
    $updatedQuantities = $request->all();
    
    // Retrieve the current cart from session.
    $cart = session()->get('cart', []);

    // Loop through each updated quantity and update the cart.
    foreach ($updatedQuantities as $productId => $quantity) {
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
        }
    }
    
    // Save the updated cart back into the session.
    session()->put('cart', $cart);
    
    return response()->json(['message' => 'Cart updated successfully!']);
}


    
}

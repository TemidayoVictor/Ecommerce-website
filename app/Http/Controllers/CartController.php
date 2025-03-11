<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request)
    {

        $cart = session()->get('cart', []);

        $product = $request->product;
        $productId = $product['id'];

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1;
        } else {
            $product = Product::find($productId);

            // Get the last image of product else use default image
            $image = $product->productImage->isNotEmpty() ? $product->productImage->last()->image : 'default.png';

            $cart[$productId] = [
                "name"     => $product->name,
                "quantity" => 1,
                "description" => $product->description,
                "price"    => $product->price,
                "image"  => $image,
                "id" => $product->id,
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'message' => 'Product added to cart',
            'cartCount' => count($cart)
        ]);

    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);

        unset($cart[$request->id]);

        session()->put('cart', $cart);

        return response()->json([
            'message' => 'Product removed from cart',
            'cartCount' => count($cart)
        ]);
    }


    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $request->quantity;
            $cart[$request->id]['subtotal'] = $cart[$request->id]['price'] * $request->quantity;
        }

        session()->put('cart', $cart);

        return response()->json([
            'message' => 'Cart updated successfully',
            'cart' => $cart
        ]);
    }

    public function getCartCount()
    {
        $cart = session()->get('cart', []);
        return response()->json(['cartCount' => count($cart)]);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index() {
        $cart = session('cart', []);
        $total = 0;
        $subtotal = 0;
        $shipping = 0;
        $location = Session::get('delivery_location');
        $coupon = Session::get('coupon');
        if($location) {
            $shipping = $location['price'];
        }

        return view('cart', [
            'cart' => $cart,
            'total' => $total,
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'coupon' => $coupon,
        ]);
    }


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

            if($product->status == "on_sale") {
                $productPrice = $product->sales;
                $sales = true;
            }

            else {
                $productPrice = $product->price;
                $sales = false;
            }

            $cart[$productId] = [
                "name"     => $product->name,
                "quantity" => 1,
                "description" => $product->description,
                "price"    => $productPrice,
                "image"  => $image,
                "id" => $product->id,
                "sales" => $sales,
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

    public function getCartTotal()
    {
        $cart = session()->get('cart', []);
        $totalSum = array_reduce($cart, function ($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);
        return response()->json(['total' => $totalSum]);
    }

}

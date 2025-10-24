<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display all items added to the cart.
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        return view('cart', compact('cart', 'total'));
    }

    /**
     * Add a product to the cart.
     */
    public function add(Request $request)
    {
        $product = Product::find($request->id);
        if (!$product) return response()->json(['success' => false, 'message' => 'Product not found.']);

        $cart = session()->get('cart', []);

        // If product already exists, increase quantity
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            // Otherwise add new product
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
            ];
        }

        // Save updated cart
        session()->put('cart', $cart);

        return response()->json(['success' => true, 'message' => 'Coffee added to cart!']);
    }

    /**
     * Remove a coffee item from cart.
     */
    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        unset($cart[$request->id]);
        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Item removed!');
    }

    /**
     * Show checkout page.
     */
    public function checkout()
    {
        return view('checkout');
    }

    /**
     * Handle order confirmation.
     */
    public function processCheckout(Request $request)
    {
        session()->forget('cart');
        return redirect()->route('home')->with('success', 'Your coffee order is confirmed!');
    }
}

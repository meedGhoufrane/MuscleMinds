<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $userId = auth()->id();
        $cart = Cart::where('user_id', $userId)->firstOrCreate(['user_id' => $userId]);

        $cart->products()->attach($product->id);

        return response()->json(['success' => 'Product added to your cart successfully']);
    }
}

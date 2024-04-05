<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1', 
        ]);
    
        // Add the product to the cart
        $cart = new Cart();
        $cart->user_id = auth()->id(); 
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->quantity; 
        $cart->save();
    
        // Provide feedback to the user
        return response()->json(['success' => 'Product added to cart successfully']);
    }
    

    public function index()
    {
        $user_id = auth()->user()->id;
        $cartItems = Cart::where('user_id', $user_id)->with('product')->get();
        return view('cart.index', compact('cartItems'));
    }

    

}

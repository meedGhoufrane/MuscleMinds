<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function addToWishlist(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);
        
        // Add the product to the wishlist
        Wishlist::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
        ]);

        // Provide feedback to the user
        return response()->json(['success' => 'Product added to wishlist successfully']);
    }
    public function index()
    {
        // Retrieve all products in the user's wishlist
        $wishlistProducts = Wishlist::where('user_id', auth()->id())->with('product')->get();

        // Pass the wishlist products to the view
        return view('wishlist.index', compact('wishlistProducts'));
    }
}

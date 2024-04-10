<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function addToWishlist(Request $request)
    {
        
        Wishlist::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
        ]);

        return response()->json(['success' => 'Product added to wishlist successfully']);
    }
    public function index()
    {
        // Retrieve all products in the user's wishlist along with their details
        $wishlistProducts = Wishlist::where('user_id', auth()->id())->with('product')->get();
        
        return view('wishlist', compact('wishlistProducts'));
    }

    public function show(Product $product)
    {
        return view('show', compact('product'));
    }

    public function removeFromWishlist(Request $request)
    {
        Wishlist::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)
            ->delete();

        return response()->json(['success' => 'Product removed from wishlist successfully']);
    }
}

<?php

namespace App\Http\Controllers;

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
        $wishlistProducts = Wishlist::where('user_id', auth()->id())->with('product')->get();

        return view('wishlist.index', compact('wishlistProducts'));
    }
}

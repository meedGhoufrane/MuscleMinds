<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        // Retrieve wishlist products for the authenticated user
        $wishlistProducts = Wishlist::where('user_id', Auth::id())->with('product')->get();
        
        // Pass the wishlist products to the profile view
        return view('profile/profile', compact('wishlistProducts'));
    }

    public function showproduct(Product $product)
    {
        return view('show', compact('product'));
    }
}

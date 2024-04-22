<?php


namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        // Retrieve wishlist products for the authenticated user
        $wishlistProducts = Wishlist::where('user_id', Auth::id())->with('product')->get();
        
        // Retrieve orders for the authenticated user
        $userOrders = Order::where('user_id', Auth::id())->get();
        
        // Pass the wishlist products and user orders to the profile view
        return view('profile/profile', compact('wishlistProducts', 'userOrders'));
    }

    public function showproduct(Product $product)
    {
        return view('show', compact('product'));
    }
}

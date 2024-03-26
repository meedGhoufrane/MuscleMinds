<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\WishlistRepositoryInterface;

class WishlistController extends Controller
{
    protected $wishlistRepository;


    public function __construct(WishlistRepositoryInterface $wishlistRepository)
    {
        $this->wishlistRepository = $wishlistRepository;
    }

    public function index()
    {
        // Retrieve all products in the user's wishlist using the repository
        $wishlistItems = $this->wishlistRepository->allProductsInWishlist();
    
        return view('wishlist', compact('wishlistItems'));
    }
    

    // Add a product to the wishlist
    public function addToWishlist(Request $request)
    {
        $productId = $request->input('product_id');
        $userId = auth()->user()->id; // Assuming user is authenticated

        $this->wishlistRepository->addToWishlist($userId, $productId);

        return redirect()->back()->with('success', 'Product added to wishlist successfully.');
    }

    public function removeFromWishlist(Request $request)
    {
        $productId = $request->input('product_id');
        $userId = auth()->user()->id; // Assuming user is authenticated

        $this->wishlistRepository->removeFromWishlist($userId, $productId);

        return redirect()->back()->with('success', 'Product removed from wishlist successfully.');
    }
}

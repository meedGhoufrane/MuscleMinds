<?php
 namespace  App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
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
        $wishlistItems = $this->wishlistRepository->allProductsInWishlist();
        return view('wishlist', compact('wishlistItems'));
    }
    
    

    // Add a product to the wishlist
   // Add a product to the wishlist
// Add a product to the wishlist
public function addToWishlist(int $userId, int $productId): bool
{
    try {
        $wishlist = Wishlist::firstOrNew(['user_id' => $userId]);
        $wishlist->products()->attach($productId);
        return true; // Return true if product is successfully added to the wishlist
    } catch (\Exception $e) {
        // Log error if any
        \Log::error('Failed to add product to wishlist: ' . $e->getMessage());
        return false; // Return false if there's an error adding the product to the wishlist
    }
}


    
    public function removeFromWishlist(Request $request, $productId)
    {
        $userId = auth()->user()->id;
    
        $this->wishlistRepository->removeFromWishlist($userId, $productId);
    
        return response()->json(['message' => 'Product removed from wishlist successfully.']);
    }
    
}

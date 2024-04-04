<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Wishlist;

class WishlistRepository implements WishlistRepositoryInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function allProductsInWishlist()
    {
        $userId = auth()->id(); 
        $wishlist = Wishlist::where('user_id', $userId)->firstOrFail();
        return $wishlist->products;
    }

    public function addToWishlist(int $userId, int $productId): void
    {
        $wishlist = Wishlist::firstOrNew(['user_id' => $userId]);
        $wishlist->products()->attach($productId);
    }

    public function removeFromWishlist(int $userId, int $productId): void
    {
        $wishlist = Wishlist::where('user_id', $userId)->firstOrFail();
        $wishlist->products()->detach($productId);
    }

    public function isProductInWishlist(int $userId, int $productId): bool
    {
        $wishlist = Wishlist::where('user_id', $userId)->first();
        if ($wishlist) {
            return $wishlist->products()->where('product_id', $productId)->exists();
        }
        return false;
    }
}

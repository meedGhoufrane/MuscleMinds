<?php

namespace App\Repositories;

interface WishlistRepositoryInterface
{

    public function allProductsInWishlist();

    /**
     * Add a product to the wishlist.
     *
     * @param int $userId
     * @param int $productId
     * @return void
     */
    public function addToWishlist(int $userId, int $productId): void;

    /**
     * Remove a product from the wishlist.
     *
     * @param int $userId
     * @param int $productId
     * @return void
     */
    public function removeFromWishlist(int $userId, int $productId): void;

    /**
     * Check if a product is in the wishlist.
     *
     * @param int $userId
     * @param int $productId
     * @return bool
     */
    public function isProductInWishlist(int $userId, int $productId): bool;

}

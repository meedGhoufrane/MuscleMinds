<x-guest-layout>
    <section class="py-12">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold text-center mb-20" >Favorite Products</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($wishlistProducts as $item)
                    <div class="bg-white rounded-lg overflow-hidden shadow-md transition-transform transform hover:scale-105 relative">
                        <img src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product->name }}" class="w-full h-64 object-cover">
                        <div class="absolute top-0 right-0 p-4 flex items-center">
                            <button class="remove-from-wishlist-btn text-red-500 hover:text-red-700" data-product-id="{{ $item->product->id }}">
                                <i class="fas fa-times-circle text-xl"></i>
                            </button>
                        </div>
                        <div class="p-6">
                            <h3 class="font-semibold text-xl mb-2">{{ $item->product->name }}</h3>
                            <p class="text-gray-700 mb-2">{{ $item->product->description }}</p>
                            <p class="text-gray-800 font-bold">${{ $item->product->price }}</p>
                            <div class="mt-4 flex justify-between items-center">
                                <button class="add-to-cart-btn text-yellow-500 hover:text-yellow-700">
                                    <i class="fas fa-cart-plus text-xl"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="w-full flex justify-center items-center h-64">
                        <p class="text-gray-600 text-lg">No items in wishlist.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('.remove-from-wishlist-btn').click(function(e) {
                e.preventDefault();
                var productId = $(this).data('product-id');
                removeFromWishlist(productId);
            });

            function removeFromWishlist(productId) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('wishlist.remove') }}',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'product_id': productId
                    },
                    success: function(response) {
                        // Show success message using Swal
                        Swal.fire({
                            title: "Success",
                            text: response.success,
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Reload the page to reflect changes
                                window.location.reload();
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        // Show error message using Swal
                        Swal.fire({
                            title: "Error",
                            text: "Failed to remove product from wishlist",
                            icon: "error"
                        });
                    }
                });
            }
        });
    </script>
</x-guest-layout>

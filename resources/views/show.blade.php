<x-guest-layout>

    @section('content')
        <div class="bg-white  py-8">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row -mx-4">
                    <div class="md:flex-1 px-4">
                        <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                            <img class="w-full h-full object-cover" src="{{ Storage::url($product->image) }}"
                                alt="{{ $product->name }}" alt="Product Image">
                        </div>

                    </div>
                    <div class="md:flex-1 px-4">
                        <h2 class="text-2xl font-bold text-black dark:text-black mb-2">{{ $product->name }}</h2>
                        <p class="text-black dark:text-black text-sm mb-4">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed ante justo. Integer euismod
                            libero id mauris malesuada tincidunt.
                        </p>
                        <div class="flex mb-4">
                            <div class="mr-4">
                                <span class="font-bold text-black dark:text-black">Price:</span>
                                <span class="text-black dark:text-black">${{ $product->price }}</span>
                            </div>
                            <div>
                                <span class="font-bold text-black dark:text-black"> Stock availability:</span>
                                <span class="text-black dark:text-black">{{ $product->stock }}</span>
                            </div>
                        </div>

                        <div>
                            <span class="font-bold text-black dark:text-black">Product Description:</span>
                            <p class="text-black dark:text-black text-sm mt-2">
                                {{ $product->description }}
                            </p>
                        </div>
                        <div class="flex -mx-2 mt-20">
                            <div class="w-full px-2">
                                <div class="flex items-center justify-between">
                                    <button
                                        class="dark:bg-gray-800  dark:text-white py-2 px-4 rounded-full font-bold hover:bg-yellow-600 dark:hover:bg-yellow-500 add-to-cart-btn"
                                        data-product-id="{{ $product->id }}">Add to Cart</button>
                                    <div class="flex items-center">
                                        <span class="mr-2 font-semibold text-black dark:text-black">Quantity:</span>
                                        <input type="number" min="1" value="1"
                                            class="w-16 h-10 px-2 text-center border-gray-300 rounded-md dark:bg-gray-800 dark:text-white"
                                            id="quantity-input">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        </div>


        <script>
            $(document).ready(function() {
                $('.add-to-cart-btn').click(function(e) {
                    e.preventDefault();
                    var productId = $(this).data('product-id');
                    var quantity = $('#quantity-input').val(); // Get the quantity value
                    addToCart(productId, quantity);
                });

                function addToCart(productId, quantity) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('cart.add') }}',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'product_id': productId,
                            'quantity': quantity // Pass the quantity to the controller
                        },
                        success: function(response) {
                            // Show success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Product added to cart',
                                text: response.success
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            // Show error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed to add product to cart u should do login ',
                                text: 'An error occurred while trying to add the product to the cart.'
                            });
                        }
                    });
                }
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </x-guest-layout>

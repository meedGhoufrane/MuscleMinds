<x-guest-layout>

<body>


    <section class="py-20">
        <div class="container mx-auto flex">
            <!-- Sidebar for filters -->
            <aside class="w-1/4 mr-10">
                <div class="mb-6">
                    <!-- Filter by category -->
                    <label for="category" class="block text-sm font-medium text-gray-700">Filter by Category:</label>
                    <select id="category" name="category"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <!-- Add options dynamically based on available categories -->
                        <option value="">All Categories</option>
                        <option value="vitamins">Vitamins</option>
                        <option value="minerals">Minerals</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div class="mb-6">
                    <!-- Filter by title -->
                    <label for="title" class="block text-sm font-medium text-gray-700">Filter by Title:</label>
                    <input type="text" name="title" id="title"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Enter title...">
                </div>
                <div class="mb-6">
                    <!-- Filter by price -->
                    <label for="price" class="block text-sm font-medium text-gray-700">Filter by Price:</label>
                    <input type="number" name="price" id="price"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Enter max price...">
                </div>
                <div>
                    <!-- Apply button -->
                    <button type="button"
                        class="py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Apply Filters</button>
                </div>
            </aside>
            <!-- Product cards -->
            <div class="w-3/4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Loop through all products and create a card for each -->
                @foreach ($products as $product)
                    <div
                        class="bg-white rounded-lg overflow-hidden shadow-md transition-transform transform hover:scale-105 relative">
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                            class="w-full h-64 object-cover">
                        <!-- Adjust the 'h-64' class to set the desired height -->
                        <div class="absolute top-0 right-0 p-2 flex flex-col items-center">
                            <!-- Heart Icon for Add to Favorites -->
                            <button class="wishlist-btn text-red-500 hover:text-red-700"
                                data-product-id="{{ $product->id }}">
                                <i class="far fa-heart text-xl"></i>
                            </button>
                            <!-- Shopping Cart Icon for Add to Cart with shadow -->
                            <button
                                class="text-yellow-500 hover:text-yellow-700 shadow-md rounded-full p-2 mt-2 add-to-cart-btn"
                                data-product-id="{{ $product->id }}">
                                <i class="fas fa-shopping-cart text-xl"></i>
                            </button>
                        </div>
                        <div class="p-6">
                            <h3 class="font-semibold text-xl mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-700 mb-2">{{ $product->description }}</p>
                            <p class="text-gray-800 font-bold">${{ $product->price }}</p>
                        </div>
                    </div>
                @endforeach

            </div>



        </div>
    </section>

    
    
    <!-- Include jQuery library -->
    <!-- Include jQuery library -->
    
    
    <script>
        $(document).ready(function() {
            // Add click event handler to wishlist button
            $('.wishlist-btn').click(function(e) {
                e.preventDefault();
                var productId = $(this).data('product-id');
                addToWishlist(productId);
            });
    
            // Function to make AJAX request to add product to wishlist
            function addToWishlist(productId) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('wishlist.add') }}',
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
                                window.location.href = '{{ route('wishlist.index') }}';
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        // Show error message using Swal
                        Swal.fire({
                            title: "Error",
                            text: "Failed to add product to wishlist",
                            icon: "error"
                        });
                    }
                });
            }
    
            // Add click event handler to add-to-cart button
            $('.add-to-cart-btn').on('click', function(e) {
                e.preventDefault();
                var productId = $(this).data('product-id');
                addToCart(productId);
            });
            
            // Function to make AJAX request to add product to cart
            function addToCart(productId) {
                $.ajax({
                    type: 'POST',
                    url: '/cart/add/' + productId,
                    data: {
                        _token: '{{ csrf_token() }}',
                        // Add other data here if needed
                    },
                    success: function(response) {
                        // Show success message using Swal
                        Swal.fire({
                            title: "Success",
                            text: response.success,
                            icon: "success"
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        // Show error message using Swal
                        Swal.fire({
                            title: "Error",
                            text: "Failed to add product to cart",
                            icon: "error"
                        });
                    }
                });
            }
        });
    </script>
    
    

</x-guest-layout>

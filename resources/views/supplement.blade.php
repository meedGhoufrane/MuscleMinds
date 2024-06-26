<x-guest-layout>




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
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <!-- Filter by title -->
                    <label for="title" class="block text-sm font-medium text-gray-700">Filter by name:</label>
                    <input type="text" name="title" id="name"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Enter title...">
                </div>
                <div class="mb-6">
                    <!-- Filter by price -->
                    <label for="price" class="block text-sm font-medium text-gray-700">Filter by Price:</label>
                    <input type="number" name="price" id="price" min="0"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Enter max price...">
                </div>
                <script>
                    
                    document.addEventListener('DOMContentLoaded', function() {
                        searchProduct();
                    });
                    
                    function searchProduct() {
                        const category = document.getElementById('category').value;
                        const name = document.getElementById('name').value;
                        const price = document.getElementById('price').value;
                        // Send an AJAX request to the server to filter products
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', '/filter?category=' + category + '&name=' + name + '&price=' + price);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4) {
                                if (xhr.status === 200) {
                                    var response = JSON.parse(xhr.responseText);
                                    // Update the product cards with the filtered products
                                    var grid = document.querySelector('.grid');
                                    grid.innerHTML = '';
                                    console.log(response);
                                    response.forEach(function(product) {

                                        var card = `
                            <div class="bg-white rounded-lg overflow-hidden shadow-md transition-transform transform hover:scale-105 relative">
                                <img src="http://127.0.0.1:8000/storage/${product.image}" alt="${product.name}" class="w-full h-64 object-cover">
                                <div class="absolute top-0 right-0 p-2 flex flex-col items-center">
                                    <button class="wishlist-btn text-red-500 hover:text-red-700" data-product-id="${product.id}" onClick="addTowich(${product.id})">
                                        <i class="far fa-heart text-xl"></i>
                                    </button>
                                    <a href="http://127.0.0.1:8000/products/${product.id}" class="text-yellow-500 hover:text-yellow-700 shadow-md rounded-full p-2 mt-2 view-product-btn"
                                        >
                                        <i class="fas fa-shopping-cart text-xl"></i>
                                    </a>
                                </div>
                                <div class="p-6">
                                    <h3 class="font-semibold text-xl mb-2">${product.name}</h3>
                                    <p class="text-gray-700 mb-2">${product.description}</p>
                                    <p class="text-gray-800 font-bold">$${product.price}</p>
                                </div>
                            </div>
                        `;   
                                        grid.insertAdjacentHTML('beforeend', card);
                                    });
                                } else {
                                    console.error('Error:', xhr.status);
                                    // Show error message using Swal or any other method
                                }
                            }
                        };
                        xhr.send();
                    }
                </script>
                <div>
                    <!-- Apply button -->
                    <button type="button" id="apply-filters" onclick="searchProduct()"
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
                            <a href="{{ route('products.show', $product) }}"
                                class="text-yellow-500 hover:text-yellow-700 shadow-md rounded-full p-2 mt-2">
                                <i class="fas fa-shopping-cart text-xl"></i>
                            </a>
                        </div>
                        <div class="p-6">
                            <h3 class="font-semibold text-xl mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-700 mb-2">{{ $product->description }}</p>
                            <p class="text-gray-800 font-bold">${{ $product->price }}</p>
                            <p class="text-gray-600">Added to carts: {{ $product->carts_count }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>





    <script>
            function addTowich(productId){
                addToWishlist(productId);
            }

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
                                // Redirect to the wishlist page or update the UI as needed
                                window.location.href = '{{ route('wishlist') }}';
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        // Show error message using Swal
                        Swal.fire({
                            title: "Error",
                            text: " Product already in wishlist",
                            icon: "error"
                        });
                    }
                });
            }
    </script>






</x-guest-layout>

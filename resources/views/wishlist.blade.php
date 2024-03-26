@include('includes.head')

<body>

    @include('includes.header')

    <section class="py-20">
        <div class="container mx-auto flex">
            <!-- Product cards -->
            <div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Loop through all wishlist items and create a card for each -->
                @foreach ($wishlistItems as $item)
                <div class="bg-white rounded-lg overflow-hidden shadow-md transition-transform transform hover:scale-105 relative">
                    <img src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product->name }}" class="w-full h-64 object-cover">
                    <!-- Adjust the 'h-64' class to set the desired height -->
                    <div class="absolute top-0 right-0 p-2 flex flex-col items-center">
                        <!-- Heart Icon for Remove from Wishlist -->
                        <form action="{{ route('wishlist.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-heart text-xl"></i>
                            </button>
                        </form>
                        <!-- Shopping Cart Icon for Add to Cart with shadow -->
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                            <button type="submit" class="text-yellow-500 hover:text-yellow-700 shadow-md rounded-full p-2 mt-2">
                                <i class="fas fa-shopping-cart text-xl"></i>
                            </button>
                        </form>
                    </div>
                    <div class="p-6">
                        <h3 class="font-semibold text-xl mb-2">{{ $item->product->name }}</h3>
                        <p class="text-gray-700 mb-2">{{ $item->product->description }}</p>
                        <p class="text-gray-800 font-bold">${{ $item->product->price }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('includes.footer')

</body>

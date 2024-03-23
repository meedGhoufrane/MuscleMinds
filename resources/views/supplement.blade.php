@include('includes.head')

<body>

    @include('includes.header')

    <section class="py-20">
        <div class="container mx-auto flex">
            <!-- Sidebar for filters -->
            <aside class="w-1/4 mr-10">
                <div class="mb-6">
                    <!-- Filter by category -->
                    <label for="category" class="block text-sm font-medium text-gray-700">Filter by Category:</label>
                    <select id="category" name="category" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
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
                    <input type="text" name="title" id="title" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter title...">
                </div>
                <div class="mb-6">
                    <!-- Filter by price -->
                    <label for="price" class="block text-sm font-medium text-gray-700">Filter by Price:</label>
                    <input type="number" name="price" id="price" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter max price...">
                </div>
                <div>
                    <!-- Apply button -->
                    <button type="button" class="py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Apply Filters</button>
                </div>
            </aside>
            <!-- Product cards -->
            <div class="w-3/4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Loop through all products and create a card for each -->
                @foreach ($products as $product)
                <div class="bg-white rounded-lg overflow-hidden shadow-md transition-transform transform hover:scale-105">
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
                    <!-- Adjust the 'h-64' class to set the desired height -->
                    <div class="p-6">
                        <h3 class="font-semibold text-xl mb-2">{{ $product->name }}</h3>
                        <p class="text-gray-700 mb-2">{{ $product->description }}</p>
                        <p class="text-gray-800 font-bold">${{ $product->price }}</p>
                        <button class="mt-4 bg-yellow-500 text-gray-900 hover:bg-yellow-600 py-2 px-4 rounded-full uppercase font-semibold tracking-wide">Add to Cart</button>
                    </div>
                </div>
                @endforeach
                
            </div>
            
        </div>
    </section>

    @include('includes.footer')

</body>

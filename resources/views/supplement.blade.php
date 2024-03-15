@include('includes.head')


<body>

    @include('includes.header')

    <section class="py-20">
        <div class="container mx-auto">
            <div class="flex justify-between mb-6">
                <!-- Search by category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Search by Category:</label>
                    <select id="category" name="category" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <!-- Add options dynamically based on available categories -->
                        <option value="">All Categories</option>
                        <option value="vitamins">Vitamins</option>
                        <option value="minerals">Minerals</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
    
                <!-- Search by title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Search by Title:</label>
                    <input type="text" name="title" id="title" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter title...">
                </div>
    
                <!-- Filter by price -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Filter by Price:</label>
                    <input type="number" name="price" id="price" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter max price...">
                </div>
            </div>
    
            <!-- Supplement cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Loop through all supplements and create a card for each -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <img src="{{ asset('images/supplement1.jpg') }}" alt="Supplement" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-800">Supplement Title</h2>
                        <p class="text-sm text-gray-600 mt-2">Category: Vitamins</p>
                        <p class="text-sm text-gray-600">Price: $20</p>
                    </div>
                </div>
                <!-- Add more cards dynamically -->
            </div>
        </div>
    </section>
    


    @include('includes.footer')


</body>
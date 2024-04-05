<x-guest-layout>
    <section class="py-20">
        <div class="container mx-auto flex">
            <!-- Product cards -->
            <div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Loop through all wishlist items and create a card for each -->
                @if ($wishlistItems)
                    @foreach ($wishlistItems as $item)
                        <div
                            class="bg-white rounded-lg overflow-hidden shadow-md transition-transform transform hover:scale-105 relative">
                            {{-- <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}" --}}
                                class="w-full h-64 object-cover">
                            <!-- Adjust the 'h-64' class to set the desired height -->
                            <div class="absolute top-0 right-0 p-2 flex flex-col items-center">
                                <!-- Heart Icon for Remove from Wishlist -->
        
                            </div>
                            <div class="p-6">
                                <h3 class="font-semibold text-xl mb-2"></h3>
                                <p class="text-gray-700 mb-2"></p>
                                <p class="text-gray-800 font-bold">${{ $item->price }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="w-full flex justify-center items-center h-64">
                        <p class="text-gray-600 text-lg">No items in wishlist.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

</x-guest-layout>


<x-guest-layout>


    <h1 class="text-4xl font-bold text-center mt-8 mb-12">Meet Our Athletes </h1>

    <div class="flex justify-center items-center mb-12 ">
        <div class="w-3/4">
            <!-- Sidebar Section --> 
            <aside class="w-1/4 mr-10">
                <!-- Your sidebar content here -->
            </aside>

            <!-- Athletes Section -->
            <div class="flex justify-center items-center mb-12">
                <div class="w-3/4">
                    <!-- Athletes Section -->
                    <div class="athletes-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-8">
                        <!-- Loop through athletes and display each athlete card -->
                        @foreach($athletes as $athlete)
                        <div class="athlete bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:rotate-y-180 relative">
                            <img src="{{ asset($athlete->image) }}" alt="{{ $athlete->name }}" class="w-full h-full">
                            <!-- Remove the object-cover class -->
                            <div class="absolute bottom-0 left-0 right-0 p-6 bg-black bg-opacity-50 text-white">
                                <h2 class="text-xl font-semibold mb-2">{{ $athlete->name }}</h2>
                                <p class="text-gray-200 mb-2">{{ $athlete->description }}</p>
                                <a href="{{ $athlete->instagram }}" class="text-blue-300 hover:underline">Instagram</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-guest-layout>

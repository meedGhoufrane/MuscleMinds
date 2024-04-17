<x-guest-layout>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <section class="bg-gray-800 text-white relative">
        <!-- Swiper Container -->
        <div class="swiper-container" style="width: 100%; height: 100%;">
            <!-- Swiper Wrapper -->
            <div class="swiper-wrapper" id="swiper-wrapper">
                <!-- Swiper will dynamically populate this section -->
                <div class="swiper-slide"><img src="{{ asset('images/raw-nutrition-2023.webp') }}" style="height: 40rem" alt="Raw Nutrition"
                        class="w-full  object-cover swiper-image" style="height: 53rem"></div>
                <div class="swiper-slide"><img src="{{ asset('images/product-jpeg.jpg') }}" style="height: 40rem" alt="Product JPEG"
                        class="w-full  object-cover swiper-image " style="height: 53rem"></div>
                <div class="swiper-slide"><img src="{{ asset('images/all-new-muscletech.jpg') }}"
                        alt="All New Muscletech" class=" w-full  object-cover swiper-image" style="height: 40rem"></div>
            </div>
            <!-- Add Pagination -->
        </div>

        <!-- Shop Now Button -->
        <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center">
            <div class="max-w-4xl mx-auto relative z-10">
                <a href="{{ route('supplement') }}"
                    class="bg-yellow-500 text-gray-900 hover:bg-yellow-600 py-3 px-8 rounded-full uppercase font-semibold tracking-wide">Shop
                    Now</a>
            </div>
        </div>
    </section>

    <!-- Include Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var swiper = new Swiper('.swiper-container', {
                effect: 'fade',
                autoplay: {
                    delay: 2000, // Change slide every 2 seconds
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                loop: false // Disable looping
            });
        });
    </script>


    <!-- Featured Products Section -->
    <section class="py-16">
        <div class="container mx-auto border">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold mb-8 text-center relative">
                    <span class="inline-block pb-2 border-b-4 border-yellow-500">Featured Products</span>
                </h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                <!-- Product Cards -->
                @foreach ($products as $products)
                    <div
                        class="bg-white rounded-lg overflow-hidden shadow-md transition-transform transform hover:scale-105">
                        <img src="{{ Storage::url($products->image) }}" alt="{{ $products->name }}"
                            class="w-full object-cover">
                        <div class="p-6">
                            <h3 class="font-semibold text-xl mb-2">{{ $products->name }}</h3>
                            <p class="text-gray-700 mb-2">{{ $products->description }}</p>


                        </div>
                    </div>
                @endforeach
                <!-- End Product Cards -->
            </div>
        </div>
    </section>




    <section class="py-20">
        <div class="container mx-auto flex justify-center">
            <div class="flex items-center">
                <!-- First div with an image -->
                <div class="mr-10">
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }} "
                        style="border-radius: 20%"
                        class="w-20 h-20 sm:w-32 sm:h-32 md:w-40 md:h-40 lg:w-48 lg:h-48 xl:w-56 xl:h-56 ">
                </div>
                <!-- Second div with text -->
                <div class="text-center">
                    <h1 class="text-3xl font-bold text-gray-800">FROM THE GROUND <span class=""
                            style="color: gold;"> UP</span>
                    </h1>
                    <p class="mt-4 text-lg text-gray-600">{{ $product->name }}</p>
                </div>
            </div>
        </div>
    </section>
    




    <!-- fetch Products by brand  and category raw  -->

    <section class="py-16">
        <div class="container mx-auto border">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold mb-8 text-center relative">
                    <span class="inline-block pb-2 border-b-4 border-yellow-500">Max Titanuem Brand</span>
                </h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                <!-- Product Cards -->
                @foreach ($productsByBrandAndCategory as $item)
                    <div
                        class="bg-white rounded-lg overflow-hidden shadow-md transition-transform transform hover:scale-105">
                        <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}"
                            class="w-full object-cover">
                        <div class="p-6">
                            <h3 class="font-semibold text-xl mb-2">{{ $item->name }}</h3>
                            <p class="text-gray-700 mb-2">{{ $item->description }}</p>
                            <p class="text-gray-800 font-bold">${{ $item->price }}</p>
                            <!-- Display brand information if available -->
                            @if ($item->brand)
                                <p class="text-gray-700 mb-2">Brand: {{ $item->brand->name }}</p>
                            @else
                                <p class="text-gray-700 mb-2">No brand information available</p>
                            @endif
                        </div>
                    </div>
                @endforeach
                <!-- End Product Cards -->
            </div>
        </div>
    </section>


    <!-- Why Choose MuscleMinds Section -->
    <section class="bg-gray-100 py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8 text-center relative">
                <span class="inline-block pb-2 border-b-4 border-yellow-500">Why Choose MuscleMinds?</span>
            </h2>
            <p class="text-lg mb-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, eius!</p>
            <div class="flex justify-center">
                <div class="flex items-center mr-8">
                    <svg class="w-12 h-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <p class="ml-2">Free Shipping</p>
                </div>
                <div class="flex items-center mr-8">
                    <svg class="w-12 h-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                    <p class="ml-2">Easy Returns</p>
                </div>
                <div class="flex items-center">
                    <svg class="w-12 h-12 text-gray-600 transform rotate-180" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 17l-4 4m0 0l-4-4m4 4V3"></path>
                    </svg>
                    <p class="ml-2">Quality Products</p>
                </div>
            </div>
        </div>
    </section>

     <!-- Athletes Section -->

     <section class="py-20">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold mb-8 text-center relative">
                <span class="inline-block pb-2 border-b-4 border-yellow-500">Featured Athletes</span>
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Athlete Card -->
                <div class="relative bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('images/ramondino.jpg') }}" alt="Athlete 1" class="w-full h-auto">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="text-white text-center">

                        </div>
                    </div>
                </div>
                <div class="relative bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('images/photo_2022-10-26_16-27-23.webp') }}" alt="Athlete 1"
                        class="w-full h-auto">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="text-white text-center">

                        </div>
                    </div>
                </div>
                <div class="relative bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('images/Ryan-Terry-2023-Mens-Physique-Olympia-champion-2.jpeg') }}"
                        alt="Athlete 1" class="w-full h-auto">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="text-white text-center">

                        </div>
                    </div>
                </div>
                <!-- Repeat the above card for each athlete -->
            </div>
        </div>
    </section>


    
    <!-- FAQ Section -->
    <section class="py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8 text-center relative">
                <span class="inline-block pb-2 border-b-4 border-yellow-500">Frequently Asked Questions</span>
            </h2>
            <div class="flex flex-col md:flex-row items-start justify-center space-y-4 md:space-y-0 md:space-x-4">
                <!-- Question -->
                <div class="w-full md:w-1/2 bg-white rounded-lg shadow-md p-6 question-card">
                    <h3 class="text-lg font-semibold mb-2">What products do you offer?</h3>
                    <p class="text-gray-600 mb-4">We offer a wide range of supplements including protein powders,
                        pre-workouts, and vitamins.</p>
                    <button
                        class="bg-gray-900 text-white px-4 py-2 rounded-md transition duration-300 hover:bg-gray-700">Show
                        Answer</button>
                </div>
                <!-- Repeat for other questions -->
                <div class="w-full md:w-1/2 bg-white rounded-lg shadow-md p-6 question-card">
                    <h3 class="text-lg font-semibold mb-2">How can I track my order?</h3>
                    <p class="text-gray-600 mb-4">You can easily track your order by logging into your account and
                        visiting the order history section.</p>
                    <button
                        class="bg-gray-900 text-white px-4 py-2 rounded-md transition duration-300 hover:bg-gray-700">Show
                        Answer</button>
                </div>
                <div class="w-full md:w-1/2 bg-white rounded-lg shadow-md p-6 question-card">
                    <h3 class="text-lg font-semibold mb-2">How can I track my order?</h3>
                    <p class="text-gray-600 mb-4">You can easily track your order by logging into your account and
                        visiting the order history section.</p>
                    <button
                        class="bg-gray-900 text-white px-4 py-2 rounded-md transition duration-300 hover:bg-gray-700">Show
                        Answer</button>
                </div>

            </div>
        </div>
    </section>








</x-guest-layout>

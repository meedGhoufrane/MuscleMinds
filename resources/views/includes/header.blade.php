<header>
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-3 lg:py-4 dark:bg-gray-800">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">

            <a href="{{ route('welcome') }}" class="flex items-center">
                <span class="self-center text-xl whitespace-nowrap">
                    <span class="font-bold italic" style="color: white;">Muscle</span>
                    <span class="font-semibold italic" style="color: gold;">Minds</span>
                </span>
            </a>

            <div class="flex items-center lg:order-2">
                <div class="flex cursor-pointer items-center gap-x-1 rounded-md py-2 px-4 ">
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                        </svg>
                        <span
                            class="absolute -top-2 -right-2 flex h-4 w-4 items-center justify-center rounded-full bg-red-500 p-2 text-xs text-white">3</span>
                    </div>
                    <a href="{{ route('cart.index') }}" class="text-sm font-medium text-white">Cart</a>
                </div>
                <div class="flex cursor-pointer items-center gap-x-1 rounded-md py-2 px-4 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                            clip-rule="evenodd" />
                    </svg>
                    <a href="{{ route('wishlist') }}" class="text-sm font-medium text-white ">Favorites</a>
                </div>
                @auth
                    <div>
                        {{-- ==================================================================== --}}
                        <div class="relative">
                            <div class="hs-dropdown inline-flex">
                                <button id="hs-dropdown-with-icons" type="button"
                                    class="hs-dropdown-toggle py-2 px-4 lg:px-5 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 relative">
                                    <img src="{{ asset('images/vladigalagan.jpg') }}" alt="Profile Image"
                                        class="w-8 h-8 rounded-full">
                                    <!-- Replace "profile_image.jpg" with the path to your profile image -->
                                    <p class="w-7"> {{ auth()->user()->name }}</p>
                                    <svg class="w-4 h-4 ml-2 -mr-1 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 12a1 1 0 01-.707-.293l-4-4a1 1 0 111.414-1.414L10 9.586l3.293-3.293a1 1 0 111.414 1.414l-4 4A1 1 0 0110 12z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                        
                                <div class="hs-dropdown-menu absolute hidden top-full left-0 z-10">
                                    <div
                                        class="bg-white shadow-md rounded-lg p-2 mt-2 divide-y divide-gray-200 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700">
                                        <div class="py-2 first:pt-0 last:pb-0">
                                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700"
                                                href="{{ route('profile') }}">
                                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                                <circle cx="9" cy="7" r="4" />
                                                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                            </svg>
                                                Profile
                                            </a>
                        
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <button
                                                    class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700"
                                                    type="submit">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                                    </svg>
                                                    Logout
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        


                    </div class="relative">
                @else
                    <a href="{{ route('login') }}"
                        class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log
                        in</a>
                    <a href="{{ route('register') }}"
                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Get
                        started</a>
                @endauth

                <button id="burger-btn"
                    class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">

                <ul class="flex flex-col mt-3 lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="{{ route('welcome') }}"
                            class="block py-2 pr-4 pl-3 text-white rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('supplement') }}"
                            class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Supplement</a>
                    </li>

                    {{-- mega menu --}}

                    {{-- <li>
                        <button data-collapse-toggle="mega-menu-full-image" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mega-menu-full-image" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                            </svg>
                        </button>
                        <div id="mega-menu-full-image" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                            <ul class="flex flex-col mt-4 font-medium md:flex-row md:mt-0 md:space-x-8 rtl:space-x-reverse"> 
                                <li>
                                    <button id="mega-menu-full-cta-image-button" data-collapse-toggle="mega-menu-full-image-dropdown" class="flex items-center justify-between w-full py-2 px-3 font-medium text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Company <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                    </button>
                                </li>
                            </ul>   
                        </div>
                    </div>
                    <div id="mega-menu-full-image-dropdown" class="mt-1 bg-white border-gray-200 shadow-sm border-y dark:bg-gray-800 dark:border-gray-600">
                        <div class="grid max-w-screen-xl px-4 py-5 mx-auto text-sm text-gray-500 dark:text-gray-400 md:grid-cols-3 md:px-6">
                            <ul class="hidden mb-4 space-y-4 md:mb-0 md:block" aria-labelledby="mega-menu-full-image-button">
                                <li>
                                    <a href="#" class="hover:underline hover:text-blue-600 dark:hover:text-blue-500">
                                        Online Stores
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="hover:underline hover:text-blue-600 dark:hover:text-blue-500">
                                        Segmentation
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="hover:underline hover:text-blue-600 dark:hover:text-blue-500">
                                        Marketing CRM
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="hover:underline hover:text-blue-600 dark:hover:text-blue-500">
                                        Online Stores
                                    </a>
                                </li>
                            </ul>
                            <ul class="mb-4 space-y-4 md:mb-0">
                                <li>
                                    <a href="#" class="hover:underline hover:text-blue-600 dark:hover:text-blue-500">
                                        Our Blog
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="hover:underline hover:text-blue-600 dark:hover:text-blue-500">
                                        Terms & Conditions
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="hover:underline hover:text-blue-600 dark:hover:text-blue-500">
                                        License
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="hover:underline hover:text-blue-600 dark:hover:text-blue-500">
                                        Resources
                                    </a>
                                </li>
                            </ul>
                            <a href="#" class="p-8 bg-local bg-gray-500 bg-center bg-no-repeat bg-cover rounded-lg bg-blend-multiply hover:bg-blend-soft-light dark:hover:bg-blend-darken" style="background-image: url(/docs/images/dashboard-overview.png)">
                                <p class="max-w-xl mb-5 font-extrabold leading-tight tracking-tight text-white">Preview the new Flowbite dashboard navigation.</p>
                                <button type="button" class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-center text-white border border-white rounded-lg hover:bg-white hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-700">
                                    Get started
                                    <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </li> --}}
                    <li>
                        <a href="{{ route('athletessp') }}"
                            class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Athletes</a>
                    </li>

                </ul>
            </div>




    </nav>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownToggle = document.querySelector('.hs-dropdown-toggle');
        const dropdownMenu = document.querySelector('.hs-dropdown-menu');

        dropdownToggle.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
            dropdownMenu.classList.toggle('opacity-0');
        });

        document.addEventListener('click', function(event) {
            const isDropdownToggle = dropdownToggle.contains(event.target);
            const isDropdownMenu = dropdownMenu.contains(event.target);

            if (!isDropdownToggle && !isDropdownMenu) {
                dropdownMenu.classList.add('hidden');
                dropdownMenu.classList.remove('opacity-100');
                dropdownMenu.classList.add('opacity-0');
            }
        });
    });
</script>

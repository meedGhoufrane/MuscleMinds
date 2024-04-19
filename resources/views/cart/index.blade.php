<!-- resources/views/cart/index.blade.php -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<x-guest-layout>

    <section class="flex items-center bg-stone-200 lg:h-screen font-poppins dark:bg-gray-900">
        <div class="justify-center flex-1 px-4 py-6 mx-auto max-w-7xl lg:py-4 md:px-6">
            <div class="p-8 bg-gray-50 dark:bg-gray-800">
                <h2 class="mb-8 text-4xl font-bold dark:text-gray-400">Your Cart</h2>
                <div class="flex flex-wrap -mx-4" id="cart-container">
                    <div class="w-full px-4 mb-8 xl:w-8/12 xl:mb-0">
                        <div class="flex flex-wrap items-center mb-6 -mx-4 md:mb-8">
                            <div class="w-full md:block hidden px-4 mb-6 md:w-4/6 lg:w-6/12 md:mb-0">
                                <h2 class="font-bold text-gray-500 dark:text-gray-400">Product name</h2>
                            </div>
                            <div class="hidden px-4 lg:block lg:w-2/12">
                                <h2 class="font-bold text-gray-500 dark:text-gray-400">Price</h2>
                            </div>
                            <div class="hidden md:block px-4 md:w-1/6 lg:w-2/12 ">
                                <h2 class="font-bold text-gray-500 dark:text-gray-400">Quantity</h2>
                            </div>
                            <div class="hidden md:block px-4 text-right md:w-1/6 lg:w-2/12 ">
                                <h2 class="font-bold text-gray-500 dark:text-gray-400"> Subtotal</h2>
                            </div>
                        </div>
                        <div class="py-4 mb-8 border-t border-b border-gray-200 dark:border-gray-700">
                            @if (empty($cartItems))
                                <p>Your cart is empty.</p>
                            @else
                                @foreach ($cartItems as $cartItem)
                                    <div class="flex flex-wrap items-center mb-6 -mx-4 md:mb-8"
                                        data-product-id="{{ $cartItem->id }}">
                                        <div class="w-full px-4 mb-6 md:w-4/6 lg:w-6/12 md:mb-0">
                                            <div class="flex flex-wrap items-center -mx-4">
                                                <div class="w-full px-4 mb-3 md:w-1/3">
                                                    <div class="w-full h-96 md:h-24 md:w-24">
                                                        <img src="{{ Storage::url($cartItem->product->image) }}"
                                                            alt="" class="object-cover w-full h-full">
                                                    </div>
                                                </div>
                                                <div class="w-2/3 px-4">
                                                    <h2 class="mb-2 text-xl font-bold dark:text-gray-400">
                                                        {{ $cartItem->product->name }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hidden px-4 lg:block lg:w-2/12">
                                            <p class="text-lg font-bold text-red-500 dark:text-gray-400 product-price">
                                                ${{ $cartItem->product->price }}
                                            </p>
                                        </div>

                                        <div class="w-auto px-4 md:w-1/6 lg:w-2/12">
                                            <div
                                                class="flex items-center px-4 font-semibold text-gray-500 dark:border-gray-700">
                                                <span class="quantity-display">{{ $cartItem->quantity }}</span>
                                            </div>
                                        </div>

                                        <div class="w-auto px-4 text-right md:w-1/6 lg:w-2/12">
                                            <p class="text-lg font-bold text-red-500 dark:text-gray-400 product-subtotal"
                                                data-product-id="{{ $cartItem->id }}"
                                                data-product-price="{{ $cartItem->product->price }}">
                                                ${{ number_format($cartItem->product->price * $cartItem->quantity, 2) }}
                                            </p>
                                        </div>

                                        <div class="w-auto px-4 md:w-1/6 lg:w-2/12 flex items-center justify-end">
                                            <button class="delete-btn text-red-500 dark:text-gray-400"
                                                data-product-id="{{ $cartItem->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 448 512">
                                                    <path fill="#ff0000"
                                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                                </svg>

                                            </button>
                                        </div>

                                    </div>
                                @endforeach
                            @endif
                        </div>

                    </div>
                    <div class="w-full px-4 xl:w-4/12">
                        <div class="p-6 border border-red-100 dark:bg-gray-900 dark:border-gray-900 bg-red-50 md:p-8">
                            <h2 class="mb-8 text-3xl font-bold text-gray-700 dark:text-gray-400">Order Summary</h2>
                            <div
                                class="flex items-center justify-between pb-4 mb-4 border-b border-gray-300 dark:border-gray-700 ">
                                <span class="text-gray-700 dark:text-gray-400">Subtotals</span>
                                <span
                                    class="text-xl font-bold text-gray-700 dark:text-gray-400 "></span>
                            </div>
                            <div class="flex items-center justify-between pb-4 mb-4 ">
                                <span class="text-gray-700 dark:text-gray-400 ">Shipping</span>
                                <span class="text-xl font-bold text-gray-700 dark:text-gray-400 ">Free</span>
                            </div>
                            <div class="flex items-center justify-between pb-4 mb-4 ">
                                <span class="text-gray-700 dark:text-gray-400">Order Total</span>
                                <span
                                    class="text-xl font-bold text-gray-700 dark:text-gray-400 order-total-display"></span>
                            </div>
                            <h2 class="text-lg text-gray-500 dark:text-gray-400">We offer:</h2>
                            <div class="flex items-center mb-4 ">
                                <a href="#">
                                    <img src="https://i.postimg.cc/g22HQhX0/70599-visa-curved-icon.png" alt=""
                                        class="object-cover h-16 mr-2 w-26">
                                </a>
                                <a href="#">
                                    <img src="https://i.postimg.cc/HW38JkkG/38602-mastercard-curved-icon.png"
                                        alt="" class="object-cover h-16 mr-2 w-26">
                                </a>
                                <a href="#">
                                    <img src="https://i.postimg.cc/HL57j0V3/38605-paypal-straight-icon.png"
                                        alt="" class="object-cover h-16 mr-2 w-26">
                                </a>
                            </div>
                            <div class="flex items-center justify-between">
                                <form action="{{route('session')}}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <input name="orderTotal"   type="text" hidden >
                                    <button type="submit" style="width: 15rem;                                    "
                                    class="block  py-4  font-bold text-center text-gray-100 uppercase bg-red-500 rounded-md hover:bg-red-600">
                                    Checkout
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('.delete-btn').click(function() {
                var productId = $(this).data('product-id');

                // Send an AJAX request to delete the product from the cart
                $.ajax({
                    url: '/cart/' + productId,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Reload the page after successful deletion
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Handle the error if any
                    }
                });

            });
        });
    </script>


    <script>
        $(document).ready(function() {
            var quantity = parseInt($(this).val());
            var price = parseFloat($('[data-product-id="' + productId + '"]').data('product-price'));

            // Increment button click handler
            $('.increment-btn').click(function() {
                var productId = $(this).data('product-id');
                var quantityInput = $('[data-product-id="' + productId + '"].quantity-input');
                var currentQuantity = parseInt(quantityInput.val());
                quantityInput.val(currentQuantity + 1).trigger(
                    'input'); // Trigger input event after updating value
            });

            // Decrement button click handler
            $('.decrement-btn').click(function() {
                var productId = $(this).data('product-id');
                var quantityInput = $('[data-product-id="' + productId + '"].quantity-input');
                var currentQuantity = parseInt(quantityInput.val());
                if (currentQuantity > 1) {
                    quantityInput.val(currentQuantity - 1).trigger(
                        'input'); // Trigger input event after updating value
                }
            });

            // Quantity input change handler
            $('.quantity-input').on('input', function() {
                var productId = $(this).data('product-id');
                var quantity = parseInt($(this).val());
                var price = parseFloat($('[data-product-id="' + productId + '"]').data('product-price'));

                console.log('Product ID:', productId);
                console.log('Quantity:', quantity);
                console.log('Price:', price);

                var subtotal = price * quantity;
                console.log('Subtotal:', subtotal);

                // Update the subtotal display
                $('[data-product-id="' + productId + '"].product-subtotal').text('$' + subtotal.toFixed(2));

                // Send an AJAX request to update the quantity on the server-side
                $.ajax({
                    url: '/update-quantity/' + productId + '/' + quantity,
                    method: 'POST',
                    success: function(response) {
                        console.log(response.message);
                        // Optionally, you can perform any additional actions after successful update
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Handle the error if any
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Function to calculate and display the order total
            function calculateOrderTotal() {
                var orderTotal = 0;
                $('.product-subtotal').each(function() {
                    var subtotal = parseFloat($(this).text().replace('$', ''));
                    orderTotal += subtotal;
                });
                $('.order-total-display').text('$' + orderTotal.toFixed(2));
                $('input[name="orderTotal"]').val(orderTotal.toFixed(2));
            }

            // Call the function initially to display the order total
            calculateOrderTotal();

            $('.delete-btn').click(function() {
                var productId = $(this).data('product-id');

                // Send an AJAX request to delete the product from the cart
                $.ajax({
                    url: '/cart/' + productId,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Reload the page after successful deletion
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Handle the error if any
                    }
                });

            });
        });
    </script>







</x-guest-layout>

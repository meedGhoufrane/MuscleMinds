<x-guest-layout>
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h1 class="text-3xl font-semibold text-gray-800">Your Profile</h1>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Name</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ auth()->user()->name }}</dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ auth()->user()->email }}</dd>
                        </div>

                        <!-- Wishlist Products -->
                        <div class="bg-gray-50 px-4 py-5 sm:px-6">
                            <h2 class="text-lg font-semibold text-gray-800">Wishlist Products</h2>
                        </div>
                        <div class="px-4 py-5 sm:px-6">
                            @forelse ($wishlistProducts as $product)
                                <div class="flex items-center justify-between py-2 border-b border-gray-200">
                                    <div class="flex items-center space-x-4">
                                        <img src="{{ Storage::url($product->product->image) }}" alt="{{ $product->product->name }}"
                                            class="h-16 w-16 object-cover rounded-lg">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                                            <p class="text-sm text-gray-600">{{ $product->description }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('products.showproduct', $product) }}"
                                            class="text-indigo-600 hover:text-indigo-800">View Product</a>
                                    </div>
                                </div>
                            @empty
                                <p class="px-4 py-2">No products in your wishlist.</p>
                            @endforelse
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <h2 class="text-lg font-semibold text-gray-800">Orders</h2>
                        </div>
                        <div class="px-4 py-5 sm:px-6">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">name</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Status</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse ($userOrders as $order)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $order->user->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $order->order_status }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">${{ $order->sub_total }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap" colspan="2">No orders found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        

                        
                    </dl>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>

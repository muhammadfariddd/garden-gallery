@extends('layouts.app')

@section('content')
    <div class="bg-gray-300 md:pt-20 pt-10">
        <section class="relative px-4 py-16 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 lg:py-32">
            <div class="flex flex-col items-center">
                <h1 class="text-4xl md:text-5xl font-bold leading-tight text-center text-green-800">
                    Our Plant Collection
                </h1>
                <p class="mt-4 text-xl text-gray-600 text-center max-w-2xl">
                    Discover our carefully curated selection of plants to bring nature into your home.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
                <!-- Plant Card 1 -->
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="h-64 bg-green-100 relative">
                        <img src="https://images.unsplash.com/photo-1501004318641-b39e6451bec6" alt="Snake Plant"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-green-700">Snake Plant</h3>
                        <p class="text-green-600 font-medium mt-1">$25.99</p>
                        <p class="text-gray-600 mt-3">
                            Low maintenance plant perfect for beginners. Thrives in low light and helps purify the air.
                        </p>
                        <button
                            class="mt-5 bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md transition-colors duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- Plant Card 2 -->
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="h-64 bg-green-100 relative">
                        <img src="https://images.unsplash.com/photo-1614594975525-e45190c55d0b" alt="Monstera Deliciosa"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-green-700">Monstera Deliciosa</h3>
                        <p class="text-green-600 font-medium mt-1">$49.99</p>
                        <p class="text-gray-600 mt-3">
                            Popular tropical plant with unique split leaves. Perfect as a statement piece.
                        </p>
                        <button
                            class="mt-5 bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md transition-colors duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- Plant Card 3 -->
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="h-64 bg-green-100 relative">
                        <img src="https://images.unsplash.com/photo-1620311497344-bce841c9c060" alt="Peace Lily"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-green-700">Peace Lily</h3>
                        <p class="text-green-600 font-medium mt-1">$32.99</p>
                        <p class="text-gray-600 mt-3">
                            Elegant flowering plant that helps purify the air and adds a touch of sophistication.
                        </p>
                        <button
                            class="mt-5 bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md transition-colors duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- Plant Card 4 -->
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="h-64 bg-green-100 relative">
                        <img src="https://images.unsplash.com/photo-1604762524889-3e2fcc145683" alt="Fiddle Leaf Fig"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-green-700">Fiddle Leaf Fig</h3>
                        <p class="text-green-600 font-medium mt-1">$79.99</p>
                        <p class="text-gray-600 mt-3">
                            Trendy indoor plant with large violin-shaped leaves. Makes a bold statement in any space.
                        </p>
                        <button
                            class="mt-5 bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md transition-colors duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- Plant Card 5 -->
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="h-64 bg-green-100 relative">
                        <img src="https://images.unsplash.com/photo-1613737693063-a3c03b374aaf" alt="Pothos"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-green-700">Pothos</h3>
                        <p class="text-green-600 font-medium mt-1">$19.99</p>
                        <p class="text-gray-600 mt-3">
                            Trailing plant with heart-shaped leaves. Easy to care for and perfect for hanging baskets.
                        </p>
                        <button
                            class="mt-5 bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md transition-colors duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>

                <!-- Plant Card 6 -->
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                    <div class="h-64 bg-green-100 relative">
                        <img src="https://images.unsplash.com/photo-1632207691143-643e2a9a9361" alt="ZZ Plant"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-green-700">ZZ Plant</h3>
                        <p class="text-green-600 font-medium mt-1">$29.99</p>
                        <p class="text-gray-600 mt-3">
                            Nearly indestructible plant with glossy leaves. Thrives in low light and requires minimal
                            watering.
                        </p>
                        <button
                            class="mt-5 bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md transition-colors duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

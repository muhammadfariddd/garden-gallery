@extends('layouts.app')

@section('content')
<div class="bg-gray-300 md:pt-20 pt-10">
    <section class="relative px-4 py-16 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 lg:py-32">
        <div class="flex flex-col items-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold leading-tight text-center text-green-800">
                Shop Now
            </h1>
            <p class="mt-4 text-xl text-gray-600 text-center max-w-2xl">
                Explore our curated collection of beautiful plants and accessories for your home garden.
            </p>
        </div>

        <!-- Filter and Sort Bar -->
        <div class="flex flex-col md:flex-row justify-between items-center bg-white p-4 rounded-lg shadow-sm mb-8">
            <div class="flex space-x-4 mb-4 md:mb-0">
                <select class="bg-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
                    <option>All Categories</option>
                    <option>Indoor Plants</option>
                    <option>Outdoor Plants</option>
                    <option>Succulents</option>
                    <option>Plant Accessories</option>
                </select>
                <select class="bg-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
                    <option>All Sizes</option>
                    <option>Small</option>
                    <option>Medium</option>
                    <option>Large</option>
                </select>
            </div>
            <div>
                <select class="bg-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
                    <option>Featured</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                    <option>Newest</option>
                </select>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            <!-- Product 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1463936575829-25148e1db1b8" alt="Monstera Deliciosa" class="w-full h-64 object-cover">
                    <div class="absolute top-0 right-0 bg-green-700 text-white px-3 py-1 m-4 rounded-full text-sm font-medium">
                        Bestseller
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <h2 class="text-xl font-bold text-gray-800">Monstera Deliciosa</h2>
                        <span class="text-green-700 font-bold">$45.99</span>
                    </div>
                    <p class="mt-2 text-gray-600">Popular indoor plant with unique split leaves.</p>
                    <div class="mt-6">
                        <button class="w-full cursor-pointer bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1512428813834-c702c7702b78" alt="Snake Plant" class="w-full h-64 object-cover">
                    <div class="absolute top-0 right-0 bg-green-700 text-white px-3 py-1 m-4 rounded-full text-sm font-medium">
                        Easy Care
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <h2 class="text-xl font-bold text-gray-800">Snake Plant</h2>
                        <span class="text-green-700 font-bold">$35.99</span>
                    </div>
                    <p class="mt-2 text-gray-600">Low-maintenance plant with upright, structural leaves.</p>
                    <div class="mt-6">
                        <button class="w-full cursor-pointer bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1596547612397-1432a7a7d37d" alt="Fiddle Leaf Fig" class="w-full h-64 object-cover">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <h2 class="text-xl font-bold text-gray-800">Fiddle Leaf Fig</h2>
                        <span class="text-green-700 font-bold">$65.99</span>
                    </div>
                    <p class="mt-2 text-gray-600">Trendy indoor plant with large, violin-shaped leaves.</p>
                    <div class="mt-6">
                        <button class="w-full cursor-pointer bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1613737693063-a3c03b374aaf" alt="Pothos" class="w-full h-64 object-cover">
                    <div class="absolute top-0 right-0 bg-green-700 text-white px-3 py-1 m-4 rounded-full text-sm font-medium">
                        Beginner
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <h2 class="text-xl font-bold text-gray-800">Golden Pothos</h2>
                        <span class="text-green-700 font-bold">$29.99</span>
                    </div>
                    <p class="mt-2 text-gray-600">Trailing plant with heart-shaped, variegated leaves.</p>
                    <div class="mt-6">
                        <button class="w-full cursor-pointer bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 5 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1545241047-6083a3684587" alt="ZZ Plant" class="w-full h-64 object-cover">
                    <div class="absolute top-0 right-0 bg-green-700 text-white px-3 py-1 m-4 rounded-full text-sm font-medium">
                        Low Light
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <h2 class="text-xl font-bold text-gray-800">ZZ Plant</h2>
                        <span class="text-green-700 font-bold">$39.99</span>
                    </div>
                    <p class="mt-2 text-gray-600">Tough plant with glossy leaves that thrives in low light.</p>
                    <div class="mt-6">
                        <button class="w-full cursor-pointer bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1620311497344-bce841c9c060" alt="Peace Lily" class="w-full h-64 object-cover">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <h2 class="text-xl font-bold text-gray-800">Peace Lily</h2>
                        <span class="text-green-700 font-bold">$44.99</span>
                    </div>
                    <p class="mt-2 text-gray-600">Elegant flowering plant with dark green leaves.</p>
                    <div class="mt-6">
                        <button class="w-full cursor-pointer bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 7 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1620293106076-ad27d651efe3" alt="Terracotta Pot" class="w-full h-64 object-cover">
                    <div class="absolute top-0 right-0 bg-green-700 text-white px-3 py-1 m-4 rounded-full text-sm font-medium">
                        Accessory
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <h2 class="text-xl font-bold text-gray-800">Terracotta Pot</h2>
                        <span class="text-green-700 font-bold">$19.99</span>
                    </div>
                    <p class="mt-2 text-gray-600">Classic terracotta pot with drainage hole, 8-inch diameter.</p>
                    <div class="mt-6">
                        <button class="w-full cursor-pointer bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 8 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1645111094670-9d51f0f63d65" alt="Watering Can" class="w-full h-64 object-cover">
                    <div class="absolute top-0 right-0 bg-green-700 text-white px-3 py-1 m-4 rounded-full text-sm font-medium">
                        Accessory
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <h2 class="text-xl font-bold text-gray-800">Metal Watering Can</h2>
                        <span class="text-green-700 font-bold">$24.99</span>
                    </div>
                    <p class="mt-2 text-gray-600">Stylish brass-finished watering can with long spout.</p>
                    <div class="mt-6">
                        <button class="w-full cursor-pointer bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            <nav class="flex items-center">
                <a href="#" class="px-4 py-2 mx-1 rounded-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    Previous
                </a>
                <a href="#" class="px-4 py-2 mx-1 rounded-md border border-green-600 bg-green-600 text-white">
                    1
                </a>
                <a href="#" class="px-4 py-2 mx-1 rounded-md border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">
                    2
                </a>
                <a href="#" class="px-4 py-2 mx-1 rounded-md border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">
                    3
                </a>
                <a href="#" class="px-4 py-2 mx-1 rounded-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    Next
                </a>
            </nav>
        </div>
    </section>
</div>
@endsection 
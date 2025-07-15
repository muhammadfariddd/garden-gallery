@extends('layouts.app')

@section('content')
    <div class="bg-green-300 md:pt-20 pt-10">
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
            <div class="bg-white p-4 rounded-lg shadow-sm mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                    <!-- Filter Section -->
                    <form action="{{ route('shop') }}" method="GET"
                        class="flex flex-col md:flex-row md:items-center gap-4 w-full">
                        <!-- Category Dropdown -->
                        <select name="category"
                            class="bg-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent  w-full">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        <!-- Sort Dropdown -->
                        <select name="sort"
                            class="bg-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent md:w-1/3 w-full">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to
                                High</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High
                                to Low</option>
                        </select>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 md:w-auto w-full">
                            Apply
                        </button>
                    </form>

                    <!-- Search Section -->
                    <form action="{{ route('shop') }}" method="GET" class="w-full">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search Products..."
                            class="w-full px-4 py-2 rounded-md bg-white border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent">
                    </form>
                </div>
            </div>


            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach ($products as $product)
                    <div
                        class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:shadow-xl hover:-translate-y-1 flex flex-col">
                        <a href="{{ route('products.show', $product->slug) }}" class="block">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="w-full h-64 object-cover">
                        </a>
                        <div class="p-4 flex-1 flex flex-col justify-between">
                            <div>
                                <div class="mb-2">
                                    @foreach ($product->categories as $category)
                                        <a href="{{ route('shop') }}?category={{ $category->id }}"
                                            class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded mr-2 mb-2">
                                            {{ $category->name }}
                                        </a>
                                    @endforeach
                                </div>
                                <a href="{{ route('products.show', $product->slug) }}"
                                    class="text-xl font-bold text-gray-800 hover:text-green-700 block mb-2 font-playfair">
                                    {{ $product->name }}
                                </a>
                                <p class="text-green-600 font-semibold mb-4">
                                    Rp{{ number_format($product->price, 0, ',', '.') }}
                                </p>
                                {{-- <p class="text-sm text-gray-500 mb-4">
                                    Stock: {{ $product->stock }}
                                </p> --}}
                            </div>
                            @if ($product->stock > 0)
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md transition duration-300 cursor-pointer">
                                        Add to Cart
                                    </button>
                                </form>
                            @else
                                <button disabled
                                    class="w-full bg-gray-400 text-white font-medium py-2 px-4 rounded-md cursor-not-allowed">
                                    Out of Stock
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $products->appends(request()->query())->links() }}
            </div>
        </section>
    </div>

    @push('scripts')
        <script>
            // We're using form submission now, so no JavaScript needed for Add to Cart
        </script>
    @endpush
@endsection

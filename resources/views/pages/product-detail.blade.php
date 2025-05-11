@extends('layouts.app')

@section('content')
    <div
        class="bg-gradient-to-br from-green-300 to-green-400 mx-auto py-12 px-4 sm:px-6 lg:px-32 md:pt-40 rounded-3xl shadow-2xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
            <!-- Product Image -->
            <div class="overflow-hidden rounded-3xl shadow-xl group relative bg-white flex items-center justify-center p-6">
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                    class="w-full h-96 object-contain group-hover:scale-105 transition duration-300 ease-in-out">
                <div
                    class="absolute top-4 left-4 bg-white/80 px-3 py-1 rounded-full text-xs font-semibold text-green-700 shadow">
                    #{{ $product->id }}
                </div>
            </div>

            <!-- Product Details -->
            <div class="space-y-8">
                <!-- Categories -->
                <div class="flex flex-wrap gap-3 mb-2">
                    @foreach ($product->categories as $category)
                        <a href="{{ route('shop') }}?category={{ $category->id }}"
                            class="bg-green-600/10 text-green-700 text-xs font-bold px-4 py-1 rounded-full border border-green-400 shadow hover:bg-green-600/20 transition">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>

                <!-- Name -->
                <h1 class="text-5xl font-extrabold text-gray-900 tracking-tight leading-tight drop-shadow-lg">
                    {{ $product->name }}</h1>

                <!-- Price -->
                <div class="flex items-center gap-4">
                    <p class="text-3xl font-bold text-green-700 drop-shadow">
                        Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                    @if ($product->stock < 10)
                        <span
                            class="bg-red-100 text-red-600 text-xs font-semibold px-3 py-1 rounded-full animate-pulse">Stok
                            Terbatas!</span>
                    @endif
                </div>

                <!-- Description -->
                <p
                    class="text-lg text-gray-800 leading-relaxed border-l-4 border-green-400 pl-4 bg-white/60 rounded-lg shadow-inner">
                    {{ $product->description }}</p>

                <!-- Stock & Care -->
                <div class="flex flex-col md:flex-row gap-6 text-base text-gray-700 mt-4">
                    <div class="flex items-center gap-2 bg-white/80 px-4 py-2 rounded-lg shadow">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M5 13l4 4L19 7" />
                        </svg>
                        <span><span class="font-semibold text-gray-900">Stok:</span> {{ $product->stock }}</span>
                    </div>
                    <div class="flex items-center gap-2 bg-white/80 px-4 py-2 rounded-lg shadow">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M9 17v-2a4 4 0 0 1 4-4h2" />
                        </svg>
                        <span><span class="font-semibold text-gray-900">Perawatan:</span>
                            {{ $product->care_instructions }}</span>
                    </div>
                </div>

                <!-- Add to Cart -->
                <div class="mt-8">
                    @if ($product->stock > 0)
                        <form action="{{ route('cart.add', $product->id) }}" method="POST"
                            class="flex flex-wrap items-center gap-4">
                            @csrf
                            <div
                                class="flex items-center border-2 border-green-400 rounded-xl overflow-hidden shadow bg-white">
                                <button type="button"
                                    class="px-4 py-2 bg-green-100 hover:bg-green-200 text-green-700 font-bold transition"
                                    onclick="decreaseQuantity()">−</button>
                                <input type="number" name="quantity" id="quantity" value="1" min="1"
                                    max="{{ $product->stock }}"
                                    class="w-16 text-center focus:outline-none border-x border-green-200 py-2 text-lg">
                                <button type="button"
                                    class="px-4 py-2 bg-green-100 hover:bg-green-200 text-green-700 font-bold transition"
                                    onclick="increaseQuantity()">+</button>
                            </div>
                            <button type="submit"
                                class="px-8 py-3 bg-gradient-to-r from-green-600 to-green-500 text-white font-bold rounded-xl shadow-lg hover:scale-105 hover:from-green-700 hover:to-green-600 transition-all text-lg">
                                <svg class="inline w-6 h-6 mr-2 -mt-1" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.35 2.7A2 2 0 0 0 7.5 19h9a2 2 0 0 0 1.85-1.3L17 13M7 13V6a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v7" />
                                </svg>
                                Tambah ke Keranjang
                            </button>
                        </form>
                    @else
                        <button disabled
                            class="px-8 py-3 bg-gray-400 text-white font-bold rounded-xl cursor-not-allowed text-lg">
                            Out of Stock
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Review Section --}}
    <div class="max-w-3xl mx-auto my-12 bg-white rounded-2xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-green-700 mb-6 flex items-center gap-2">
            <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.38-2.454a1 1 0 00-1.175 0l-3.38 2.454c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z" />
            </svg>
            Ulasan Produk
        </h2>
        @php
            $reviews = $product->reviews()->with('user')->latest()->get();
            $userReview = null;
            if (auth()->check()) {
                $userReview = $reviews->where('user_id', auth()->id())->first();
            }
        @endphp
        <div class="mb-8">
            @if ($reviews->count() > 0)
                <div class="space-y-6">
                    @foreach ($reviews as $review)
                        <div class="border-b pb-4 flex gap-4 items-start">
                            <div
                                class="flex-shrink-0 w-10 h-10 rounded-full bg-green-100 flex items-center justify-center font-bold text-green-700">
                                {{ strtoupper(substr($review->user->name, 0, 1)) }}
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center gap-2">
                                    <span class="font-semibold text-gray-800">{{ $review->user->name }}</span>
                                    <span class="flex items-center">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.38-2.454a1 1 0 00-1.175 0l-3.38 2.454c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z" />
                                            </svg>
                                        @endfor
                                    </span>
                                </div>
                                <div class="text-gray-700 mt-1">{{ $review->comment }}</div>
                                <div class="text-xs text-gray-400 mt-1">{{ $review->created_at->diffForHumans() }}</div>
                                @if (auth()->check() && $review->user_id == auth()->id())
                                    <form action="{{ route('reviews.destroy', $review) }}" method="POST"
                                        class="inline-block mt-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 text-xs hover:underline">Hapus</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-gray-500">Belum ada ulasan untuk produk ini.</div>
            @endif
        </div>
        @auth
            <div class="border-t pt-6 mt-6">
                <h3 class="text-lg font-semibold mb-2">
                    @if ($userReview)
                        Edit Ulasan Anda
                    @else
                        Tulis Ulasan
                    @endif
                </h3>
                <form action="{{ $userReview ? route('reviews.update', $userReview) : route('reviews.store', $product) }}"
                    method="POST" class="space-y-4">
                    @csrf
                    @if ($userReview)
                        @method('PATCH')
                    @endif
                    <div class="flex items-center gap-2">
                        <span class="mr-2">Rating:</span>
                        <div class="flex items-center">
                            @for ($i = 1; $i <= 5; $i++)
                                <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}"
                                    class="hidden" {{ old('rating', $userReview->rating ?? 0) == $i ? 'checked' : '' }} />
                                <label for="star{{ $i }}" class="cursor-pointer">
                                    <svg class="w-6 h-6 {{ old('rating', $userReview->rating ?? 0) >= $i ? 'text-yellow-400' : 'text-gray-300' }} hover:text-yellow-500 transition-colors"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.38-2.454a1 1 0 00-1.175 0l-3.38 2.454c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z" />
                                    </svg>
                                </label>
                            @endfor
                        </div>
                    </div>
                    <div>
                        <textarea name="comment" rows="3"
                            class="w-full border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500"
                            placeholder="Tulis ulasan Anda...">{{ old('comment', $userReview->comment ?? '') }}</textarea>
                    </div>
                    <button type="submit"
                        class="bg-green-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-green-700 transition">
                        @if ($userReview)
                            Update Ulasan
                        @else
                            Kirim Ulasan
                        @endif
                    </button>
                </form>
            </div>
        @else
            <div class="text-center text-gray-500 mt-6">
                <a href="{{ route('login') }}" class="text-green-600 hover:underline font-semibold">Login</a> untuk menulis
                ulasan.
            </div>
        @endauth
    </div>

    <script>
        function increaseQuantity() {
            const input = document.getElementById('quantity');
            const max = parseInt(input.getAttribute('max'));
            if (parseInt(input.value) < max) {
                input.value = parseInt(input.value) + 1;
            }
        }

        function decreaseQuantity() {
            const input = document.getElementById('quantity');
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        }

        // Interaktivitas rating bintang
        document.querySelectorAll('input[name="rating"]').forEach(input => {
            input.addEventListener('change', function() {
                const rating = this.value;
                document.querySelectorAll('label[for^="star"]').forEach((label, index) => {
                    const star = label.querySelector('svg');
                    if (index < rating) {
                        star.classList.remove('text-gray-300');
                        star.classList.add('text-yellow-400');
                    } else {
                        star.classList.remove('text-yellow-400');
                        star.classList.add('text-gray-300');
                    }
                });
            });
        });
    </script>
@endsection

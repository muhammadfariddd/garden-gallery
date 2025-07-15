@extends('layouts.app')

@section('content')
    <div class="bg-green-300 mx-auto px-4 md:px-12 py-8 md:pt-40 pt-20">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Shopping Cart Section -->
            <div class="lg:w-2/3">
                <h1 class="text-2xl font-playfair mb-6">Shopping Cart</h1>

                @if (count($cartItems) > 0)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                        <!-- Cart Header -->
                        <div class="grid grid-cols-12 gap-4 p-4 bg-gray-50 text-sm font-medium text-gray-600">
                            <div class="col-span-6 md:col-span-6">PRODUK</div>
                            <div class="col-span-3 md:col-span-2 text-center">HARGA</div>
                            <div class="col-span-3 md:col-span-2 text-center">JUMLAH</div>
                            <div class="hidden md:block md:col-span-2 text-center">SUBTOTAL</div>
                        </div>

                        <!-- Cart Items -->
                        <div class="divide-y divide-gray-200">
                            @foreach ($cartItems as $item)
                                <div class="grid grid-cols-12 gap-4 p-4 items-center">
                                    <!-- Product Info -->
                                    <div class="col-span-6 md:col-span-6">
                                        <div class="flex items-center space-x-4">
                                            <img src="{{ asset('storage/' . $item->product->image) }}"
                                                alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded-md">
                                            <div>
                                                <h3 class="font-medium text-gray-900">{{ $item->product->name }}</h3>
                                                <p class="text-sm text-gray-500 hidden md:block">
                                                    {{ Str::limit($item->product->description, 50) }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Price -->
                                    <div class="col-span-3 md:col-span-2 text-center">
                                        <span class="text-gray-900">Rp{{ number_format($item->price, 0, ',', '.') }}</span>
                                    </div>

                                    <!-- Quantity -->
                                    <div class="col-span-3 md:col-span-2">
                                        <div class="flex items-center justify-center">
                                            <form action="{{ route('cart.update', $item->product) }}" method="POST"
                                                class="flex items-center space-x-2"
                                                id="update-form-{{ $item->product->id }}">
                                                @csrf
                                                @method('PATCH')
                                                <a href="#"
                                                    onclick="event.preventDefault(); decrementQuantity({{ $item->product->id }})"
                                                    class="w-3 h-3 sm:w-6 sm:h-6 flex items-center justify-center rounded-full border border-gray-300 hover:bg-gray-100">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M20 12H4" />
                                                    </svg>
                                                </a>
                                                <input type="number" name="quantity" id="quantity-{{ $item->product->id }}"
                                                    value="{{ $item->quantity }}" min="1"
                                                    class="w-4 md:w-10 text-center border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500">
                                                <a href="#"
                                                    onclick="event.preventDefault(); incrementQuantity({{ $item->product->id }})"
                                                    class="w-3 h-3 sm:w-6 sm:h-6 flex items-center justify-center rounded-full border border-gray-300 hover:bg-gray-100">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M12 4v16m8-8H4" />
                                                    </svg>
                                                </a>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Subtotal - Hidden on Mobile -->
                                    <div class="hidden md:block md:col-span-2 text-center"
                                        data-product-id="{{ $item->product->id }}">
                                        <span class="font-medium text-gray-900 subtotal">
                                            Rp{{ number_format($item->subtotal, 0, ',', '.') }}
                                        </span>
                                        <form action="{{ route('cart.remove', $item->product) }}" method="POST"
                                            class="mt-2" onsubmit="return confirmDelete(event)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-sm text-gray-600 hover:text-red-600 cursor-pointer">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>

                                    <!-- Mobile Remove Button -->
                                    <div class="col-span-12 md:hidden text-center mt-2">
                                        <form action="{{ route('cart.remove', $item->product) }}" method="POST"
                                            onsubmit="return confirmDelete(event)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-sm text-gray-600 hover:text-red-600">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Update Cart Button -->
                    {{-- <div class="mt-4 flex justify-end">
                        <button id="update-all-button" type="button" onclick="updateAllCarts()"
                            class="bg-gray-100 text-gray-800 px-6 py-2 rounded-md hover:bg-gray-200 transition-colors cursor-pointer">
                            Update cart
                        </button>
                    </div> --}}
                @else
                    <div class="bg-white rounded-lg shadow-sm p-8 text-center">
                        <p class="text-gray-500 mb-4">Keranjang Anda kosong</p>
                        <a href="{{ route('shop') }}"
                            class="inline-block bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition-colors">
                            Lanjutkan Belanja
                        </a>
                    </div>
                @endif
            </div>

            <!-- Cart Totals Section -->
            <div class="lg:w-1/3">
                <h2 class="text-2xl font-playfair mb-6">Total Keranjang</h2>
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="space-y-4">
                        <div class="flex justify-between pb-4 border-b border-gray-200">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-medium total-amount">Rp{{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between pb-4">
                            <span class="font-medium text-gray-900">Total</span>
                            <span
                                class="font-medium text-gray-900 total-amount">Rp{{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    @if (count($cartItems) > 0)
                        <a href="{{ route('checkout') }}"
                            class="block mt-6 w-full bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-700 transition-colors text-center font-medium">
                            Lanjutkan ke Pembayaran
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function processCheckout() {
                // Cek apakah sudah login (dilakukan oleh server juga)
                @if (!auth()->check())
                    Swal.fire({
                        title: 'Login Diperlukan',
                        text: 'Anda perlu login atau daftar terlebih dahulu untuk melanjutkan proses pembayaran.',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#10B981',
                        cancelButtonColor: '#EF4444',
                        confirmButtonText: 'Login Sekarang',
                        cancelButtonText: 'Nanti Saja'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Tandai sebagai checkout untuk menampilkan pesan yang tepat
                            localStorage.setItem('checkout_redirect', '1');

                            // Redirect ke halaman login
                            window.location.href = "{{ route('login') }}";
                        }
                    });
                @else
                    // Jika sudah login, submit form checkout
                    document.getElementById('checkout-form').submit();
                @endif
            }

            function decrementQuantity(productId) {
                const input = document.getElementById(`quantity-${productId}`);
                const currentValue = parseInt(input.value);
                if (currentValue > 1) {
                    input.value = currentValue - 1;
                    document.getElementById(`update-form-${productId}`).submit();
                }
            }

            function incrementQuantity(productId) {
                const input = document.getElementById(`quantity-${productId}`);
                const currentValue = parseInt(input.value);
                input.value = currentValue + 1;
                document.getElementById(`update-form-${productId}`).submit();
            }

            function updateAllCarts() {
                const updateButton = document.querySelector('#update-all-button');
                if (updateButton) {
                    updateButton.disabled = true;
                    updateButton.innerHTML =
                        '<svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-gray-800 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Memperbarui...';
                }

                // Ambil semua form keranjang
                const forms = document.querySelectorAll('[id^="update-form-"]');
                if (forms.length > 0) {
                    // Submit form pertama - ini akan menyegarkan halaman dan memperbarui semuanya
                    forms[0].submit();
                } else {
                    if (updateButton) {
                        updateButton.disabled = false;
                        updateButton.innerHTML = 'Perbarui Keranjang';
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Tidak ada item untuk diperbarui'
                    });
                }
            }

            function confirmDelete(e) {
                // Hindari aksi default form
                e.preventDefault();

                // Ambil formulir yang di-klik
                const form = e.target.closest('form');

                // Ambil nama produk jika tersedia
                const productElement = form.closest('.grid').querySelector('h3');
                const productName = productElement ? productElement.textContent.trim() : 'item';

                // Tampilkan dialog konfirmasi
                Swal.fire({
                    title: 'Konfirmasi Penghapusan',
                    text: `Yakin ingin menghapus ${productName} dari keranjang?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#10B981',
                    cancelButtonColor: '#EF4444',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Set flag untuk menandai bahwa ini adalah aksi penghapusan yang dikonfirmasi
                        const formData = new FormData(form);
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'confirmed_delete';
                        input.value = 'true';
                        form.appendChild(input);

                        // Submit form setelah konfirmasi
                        form.submit();
                    }
                });

                // Kembalikan false untuk mencegah form submit otomatis
                return false;
            }

            // Tambahkan event listeners ke semua form penghapusan
            document.addEventListener('DOMContentLoaded', function() {
                const removeForms = document.querySelectorAll('form[action*="cart/remove"]');
                removeForms.forEach(form => {
                    form.addEventListener('submit', confirmDelete);
                });
            });
        </script>
    @endpush
@endsection

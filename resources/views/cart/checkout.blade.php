@extends('layouts.app')

@section('content')
    <div class="bg-gradient-to-br from-green-300 to-green-400 min-h-screen py-12 md:pt-40 pt-25">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-3xl md:text-4xl font-bold text-green-800 drop-shadow-lg">Checkout</h1>
                <p class="mt-2 text-lg text-gray-700">Lengkapi informasi pengiriman dan pembayaran Anda</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <!-- Form Pengiriman -->
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-green-100">
                    <h2 class="text-xl font-semibold text-green-700 mb-6 flex items-center gap-2">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 01-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Informasi Pengiriman
                    </h2>
                    <form action="{{ route('checkout.process') }}" method="POST" id="checkout-form">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" name="name" id="name" value="{{ auth()->user()->name }}"
                                    required
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" value="{{ auth()->user()->email }}"
                                    required
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                                <input type="tel" name="phone" id="phone" required
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                            </div>
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                                <textarea name="address" id="address" rows="3" required
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"></textarea>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="city" class="block text-sm font-medium text-gray-700">Kota</label>
                                    <input type="text" name="city" id="city" required
                                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                                </div>
                                <div>
                                    <label for="postal_code" class="block text-sm font-medium text-gray-700">Kode
                                        Pos</label>
                                    <input type="text" name="postal_code" id="postal_code" required
                                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                                </div>
                            </div>
                            <div>
                                <label for="notes" class="block text-sm font-medium text-gray-700">Catatan
                                    (Opsional)</label>
                                <textarea name="notes" id="notes" rows="2"
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                                    placeholder="Catatan tambahan untuk pengiriman..."></textarea>
                            </div>
                        </div>
                        <div class="mt-8">
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-green-500 to-green-700 text-white px-6 py-3 rounded-lg font-semibold hover:from-green-600 hover:to-green-800 transition duration-200 flex items-center justify-center shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Bayar Sekarang
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Ringkasan Pesanan -->
                <div class="space-y-6">
                    <div class="bg-white rounded-2xl shadow-xl p-8 border border-green-100">
                        <h2 class="text-xl font-semibold text-green-700 mb-6 flex items-center gap-2">
                            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6" />
                            </svg>
                            Ringkasan Pesanan
                        </h2>
                        <div class="space-y-4">
                            @if (count($cartItems) > 0)
                                @foreach ($cartItems as $item)
                                    <div class="flex items-center space-x-4">
                                        <img src="{{ asset('images/' . $item['product']->image) }}"
                                            alt="{{ $item['product']->name }}"
                                            class="w-20 h-20 object-cover rounded-lg border border-green-200">
                                        <div class="flex-1">
                                            <h3 class="text-base font-semibold text-gray-900">{{ $item['product']->name }}
                                            </h3>
                                            <p class="text-sm text-gray-500">Total: {{ $item['quantity'] }}</p>
                                            <p class="text-sm font-medium text-green-600">
                                                Rp{{ number_format($item['subtotal'], 0, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="border-t border-gray-200 mt-6 pt-6">
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="text-gray-900">Rp{{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-gray-600">Pengiriman</span>
                                <span class="text-gray-900">Rp20.000</span>
                            </div>
                            <div class="flex justify-between text-base font-bold mt-4">
                                <span class="text-gray-900">Total</span>
                                <span class="text-green-700">Rp{{ number_format($total + 20000, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Metode Pembayaran -->
                    <div class="bg-white rounded-2xl shadow-xl p-8 border border-green-100">
                        <h2 class="text-xl font-semibold text-green-700 mb-6 flex items-center gap-2">
                            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 0V4m0 10v6m8-8h-6m-4 0H4" />
                            </svg>
                            Metode Pembayaran
                        </h2>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <input type="radio" name="payment_method" id="transfer" value="transfer" checked
                                    class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300">
                                <label for="transfer" class="ml-3 block text-sm font-medium text-gray-700">
                                    Transfer Bank
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" name="payment_method" id="ewallet" value="ewallet"
                                    class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300">
                                <label for="ewallet" class="ml-3 block text-sm font-medium text-gray-700">
                                    E-Wallet (OVO, GoPay, DANA, dll)
                                </label>
                            </div>
                        </div>
                        <div class="mt-4 text-xs text-gray-500">
                            <b>Transfer Bank:</b> Anda akan menerima instruksi pembayaran dan nomor rekening setelah
                            checkout.<br>
                            <b>E-Wallet:</b> Anda akan menerima QR code atau nomor tujuan pembayaran setelah checkout.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

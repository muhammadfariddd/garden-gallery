@extends('layouts.app')

@section('content')
    <div class="bg-green-300 mx-auto px-4 md:px-12 py-8 pt-40">
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-green-100 max-w-3xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl md:text-3xl font-bold text-green-700 flex items-center gap-2">
                    <svg class="w-7 h-7 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17v-2a4 4 0 014-4h3m4 0V7a2 2 0 00-2-2h-7a2 2 0 00-2 2v6" />
                    </svg>
                    Detail Pesanan
                </h1>
                <span
                    class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                @if ($order->status === 'pending') bg-yellow-100 text-yellow-800
                @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                @elseif($order->status === 'delivered') bg-green-100 text-green-800
                @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                @else bg-gray-100 text-gray-800 @endif">
                    {{ ucfirst($order->status) }}
                </span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div>
                    <div class="mb-4">
                        <span class="block text-gray-500 text-xs">No. Order</span>
                        <span class="font-semibold text-green-700 text-lg">{{ $order->order_number }}</span>
                    </div>
                    <div class="mb-4">
                        <span class="block text-gray-500 text-xs">Tanggal Order</span>
                        <span class="font-medium">{{ $order->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    <div class="mb-4">
                        <span class="block text-gray-500 text-xs">Alamat Pengiriman</span>
                        <span class="font-medium">{{ $order->shipping_address }}</span>
                    </div>
                    <div class="mb-4">
                        <span class="block text-gray-500 text-xs">Metode Pembayaran</span>
                        <span class="font-medium uppercase">{{ $order->payment_method }}</span>
                    </div>
                    <div class="mb-4">
                        <span class="block text-gray-500 text-xs">Bukti Transfer</span><br>
                        @if ($order->bukti_transfer)
                            <img src="{{ asset('storage/' . $order->bukti_transfer) }}" alt="Bukti Transfer"
                                class="w-40 rounded shadow mt-2 border border-green-200">
                            <a href="{{ asset('storage/' . $order->bukti_transfer) }}" target="_blank"
                                class="block text-xs text-green-600 hover:underline mt-1">Lihat Gambar</a>
                        @else
                            <span class="text-gray-400">Belum diupload</span>
                        @endif
                    </div>
                </div>
                <div class="bg-green-50 rounded-xl p-6 flex flex-col justify-between">
                    <div>
                        <span class="block text-gray-500 text-xs mb-1">Total Pembayaran</span>
                        <span
                            class="text-2xl font-bold text-green-700">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</span>
                    </div>
                    <div class="mt-6">
                        <span class="block text-gray-500 text-xs mb-1">Status Pembayaran</span>
                        <span
                            class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                        @if ($order->payment_status === 'pending') bg-yellow-100 text-yellow-800
                        @elseif($order->payment_status === 'paid') bg-green-100 text-green-800
                        @elseif($order->payment_status === 'failed') bg-red-100 text-red-800
                        @else bg-gray-100 text-gray-800 @endif">
                            {{ ucfirst($order->payment_status) }}
                        </span>
                    </div>
                </div>
            </div>
            <hr class="my-6">
            <h2 class="text-lg font-semibold mb-4 text-green-700 flex items-center gap-2">
                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                </svg>
                Daftar Produk
            </h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg shadow text-sm">
                    <thead class="bg-green-100">
                        <tr>
                            <th class="py-2 px-4 text-left font-semibold text-green-700">Produk</th>
                            <th class="py-2 px-4 text-left font-semibold text-green-700">Jumlah</th>
                            <th class="py-2 px-4 text-left font-semibold text-green-700">Harga Satuan</th>
                            <th class="py-2 px-4 text-left font-semibold text-green-700">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item)
                            <tr class="border-b">
                                <td class="py-2 px-4 flex items-center gap-2">
                                    <img src="{{ asset('storage/' . $item->product->image) }}"
                                        alt="{{ $item->product->name }}" class="w-12 h-12 object-cover rounded border">
                                    <span>{{ $item->product->name }}</span>
                                </td>
                                <td class="py-2 px-4">{{ $item->quantity }}</td>
                                <td class="py-2 px-4">Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                                <td class="py-2 px-4 font-semibold">Rp{{ number_format($item->subtotal, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-8 text-center">
                <a href="{{ route('shop') }}"
                    class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition">Belanja
                    Lagi</a>
            </div>
        </div>
    </div>
@endsection

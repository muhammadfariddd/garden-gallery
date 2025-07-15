@extends('layouts.app')

@section('content')
    <div class="bg-green-300 min-h-screen flex flex-col md:pt-35 pt-10 pb-12">
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <div class="sm:mx-auto sm:w-full sm:max-w-md mb-6">
                    <h2 class="text-center text-3xl font-extrabold text-gray-900">
                        Login
                    </h2>
                    <p class="mt-2 text-center text-sm text-gray-600">
                        Atau
                        <a href="{{ route('register') }}" class="font-medium text-green-600 hover:text-green-500">
                            daftar akun baru
                        </a>
                    </p>
                </div>

                <form class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email address
                        </label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm"
                                value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Password
                        </label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox"
                                class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-gray-900">
                                Ingat saya
                            </label>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Login
                        </button>
                    </div>
                </form>

                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">
                                Atau lanjutkan dengan
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-1 gap-3">
                        <a href="{{ route('cart.index') }}"
                            class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            Kembali ke Keranjang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('cart_action') == 'checkout_login')
        @push('scripts')
            <script>
                // Show message if coming from checkout
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Login untuk Checkout',
                        text: 'Silakan login atau daftar terlebih dahulu untuk melanjutkan proses pembayaran',
                        icon: 'info',
                        confirmButtonColor: '#10B981',
                        confirmButtonText: 'Mengerti'
                    });
                });
            </script>
        @endpush
    @endif
@endsection

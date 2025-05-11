{{-- Desktop Navbar --}}
<div id="navbar" class="fixed w-full z-50 transition-all duration-300 py-4 px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64">
    <div class="flex flex-wrap items-center justify-between">
        <div class="w-full md:w-auto flex items-center justify-between">
            <a href="/" class="nav-logo font-bold text-2xl transition-colors duration-300 text-white">
                Garden Gallery
            </a>

            <!-- Cart -->
            <a href="/cart"
                class="nav-link py-2 inline-flex text-white md:px-2 font-semibold hover:text-green-600 transition-colors duration-300 md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-shopping-cart">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                @php
                    $cartCount = 0;
                    if (auth()->check()) {
                        $cartCount = \App\Models\OrderItem::whereNull('order_id')
                            ->where('user_id', auth()->id())
                            ->sum('quantity');
                    }
                @endphp
                <span
                    class="absolute -top-1 -left-1 w-4 h-4 text-[10px] font-bold text-white bg-red-600 rounded-full flex items-center justify-center">
                    {{ $cartCount }}
                </span>
            </a>
        </div>

        <div class="hidden w-full md:w-auto md:block" id="menu">
            <nav
                class="w-full bg-white md:bg-transparent rounded shadow-lg px-6 py-4 mt-4 text-center md:p-0 md:mt-0 md:shadow-none">
                <ul class="md:flex items-center justify-center">
                    <li><a class="nav-link py-2 inline-block text-gray-800 md:text-white lg:block font-semibold hover:text-green-600 transition-colors duration-300"
                            href="/">Home</a></li>
                    <li class="md:ml-4"><a
                            class="nav-link py-2 inline-block text-gray-800 md:text-white  lg:block font-semibold hover:text-green-600 transition-colors duration-300"
                            href="/about">About Us</a></li>
                    <li class="md:ml-4"><a
                            class="nav-link py-2 inline-block text-gray-800 md:text-white md:px-2 font-semibold hover:text-green-600 transition-colors duration-300"
                            href="/shop">Plants</a></li>
                    <li class="md:ml-4"><a
                            class="nav-link py-2 inline-block text-gray-800 md:text-white md:px-2 font-semibold hover:text-green-600 transition-colors duration-300"
                            href="/care-guide">Care Guide</a></li>

                    <div class="ml-auto flex items-center">
                        <!-- Cart -->
                        <li class="ml-4">
                            <a href="/cart"
                                class="nav-link py-2 inline-flex text-gray-800 md:text-white md:px-2 font-semibold hover:text-green-600 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-shopping-cart">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                                @php
                                    $cartCount = 0;
                                    if (auth()->check()) {
                                        $cartCount = \App\Models\OrderItem::whereNull('order_id')
                                            ->where('user_id', auth()->id())
                                            ->sum('quantity');
                                    }
                                @endphp
                                <span
                                    class="absolute -top-1 -left-1 w-4 h-4 text-[10px] font-bold text-white bg-red-600 rounded-full flex items-center justify-center">
                                    {{ $cartCount }}
                                </span>
                            </a>
                        </li>

                        <!-- Profile -->
                        <li class="">
                            <a href="/profile"
                                class="nav-link py-2 inline-block text-gray-800 md:text-white md:px-2 font-semibold hover:text-green-600 transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </a>
                        </li>

                    </div>
                </ul>
            </nav>
        </div>
    </div>
</div>

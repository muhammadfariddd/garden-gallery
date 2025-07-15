@extends('layouts.app')

@section('content')
    <!-- start hero -->
    <div class="bg-gray-100">
        <section
            class="cover bg-green-earth-gradient relative px-4 sm:px-8 lg:px-16 xl:px-40 2xl:px-64 overflow-hidden py-48 flex items-center min-h-screen">
            <div class="h-full absolute top-0 left-0 z-0">
                <img src="{{ asset('images/cover-bg.jpg') }}" alt="" class="w-full h-full object-cover opacity-20">
            </div>

            <div class="lg:w-3/4 xl:w-2/4 relative z-10 h-100 lg:mt-16">
                <div>
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">About Garden
                        Gallery
                    </h1>
                    <p class="mt-6 text-xl text-white max-w-3xl">Discover our story and passion for bringing nature's beauty
                        into
                        your home.</p>
                </div>
            </div>
        </section>
    </div>
    <!-- end hero -->


    <!-- Our Story Section -->
    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-2 lg:gap-8 items-center">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Our Story</h2>
                <div class="mt-6 text-gray-500 space-y-6">
                    <p>Founded in 2020, Garden Gallery began as a small family-owned nursery with a simple mission: to
                        help people connect with nature through beautiful, healthy plants.</p>
                    <p>What started as a passion project has grown into a thriving community of plant enthusiasts. We're
                        proud to offer a carefully curated selection of indoor and outdoor plants, along with expert
                        advice to help them thrive in your space.</p>
                    <p>Our team of horticulturists and plant care specialists are dedicated to providing the highest
                        quality plants and the best customer service in the industry.</p>
                </div>
            </div>
            <div class="mt-12 lg:mt-0">
                <img class="rounded-lg shadow-xl" src="{{ asset('images/cover-bg.jpg') }}" alt="Our story">
            </div>
        </div>
    </div>

    <!-- Our Values Section -->
    <div class="bg-gray-50">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Our Values</h2>
                <p class="mt-4 text-lg text-gray-500">The principles that guide everything we do</p>
            </div>
            <div class="mt-12 grid gap-8 md:grid-cols-3">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="text-green-600">
                        <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-xl font-semibold text-gray-900">Sustainability</h3>
                    <p class="mt-2 text-gray-500">We're committed to eco-friendly practices and sustainable sourcing of
                        our plants and materials.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="text-green-600">
                        <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-xl font-semibold text-gray-900">Quality</h3>
                    <p class="mt-2 text-gray-500">Every plant in our collection is carefully selected and nurtured to
                        ensure the highest quality.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="text-green-600">
                        <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-xl font-semibold text-gray-900">Community</h3>
                    <p class="mt-2 text-gray-500">We believe in building a community of plant lovers and sharing
                        knowledge to help everyone succeed.</p>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection

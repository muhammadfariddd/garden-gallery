<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js', 'resources/js/custom.js'])
    <title>Garden Studio</title>
</head>

<body class="antialiased font-sans text-gray-900">
    <main class="w-full main-content pt-0">
        @include('partials.header')
        @yield('content')
        @include('partials.footer')
    </main>
    {{-- Mobile Bottom Navigation Bar --}}
    @include('partials.mobile-navbar')
</body>

</html>

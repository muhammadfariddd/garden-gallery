<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js', 'resources/js/custom.js'])
    <title>{{ config('app.name', 'Garden Gallery') }}</title>
    <link rel="icon" href="{{ asset('images/logo-navbar.png') }}" type="image/x-icon">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-material-ui/material-ui.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="antialiased font-sans text-gray-900">
    <div class="min-h-screen bg-gray-100">
        @include('partials.header')
        @yield('content')
        @include('partials.footer')
    </div>
    {{-- Mobile Bottom Navigation Bar --}}
    @include('partials.mobile-navbar')

    <!-- GSAP Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/TextPlugin.min.js"></script>

    <!-- SweetAlert2 Flash Messages - Only show on direct cart actions -->
    @if (session('success') && session('cart_action'))
        <script>
            // Memeriksa apakah ini adalah load halaman pertama atau hasil dari navigasi back
            const isNavigatingBack = window.performance && window.performance.navigation &&
                (window.performance.navigation.type === 2 ||
                    (performance.getEntriesByType &&
                        performance.getEntriesByType('navigation')[0].type === 'back_forward'));

            // Tracking ID unik untuk pesan ini
            const messageId = '{{ md5(session('success') . session('cart_action') . time()) }}';

            // Cek apakah pesan ini sudah pernah ditampilkan
            if (!isNavigatingBack && !localStorage.getItem('msg_shown_' + messageId)) {
                // Tampilkan pesan hanya jika bukan dari navigasi back dan belum pernah ditampilkan
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 3000
                });

                // Tandai pesan ini sudah ditampilkan
                localStorage.setItem('msg_shown_' + messageId, '1');

                // Hapus penanda setelah waktu tertentu
                setTimeout(() => {
                    localStorage.removeItem('msg_shown_' + messageId);
                }, 10000); // 10 detik
            }

            // Kirim AJAX untuk menghapus session flash agar tidak muncul lagi
            fetch("{{ url('/clear-flash-message') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            // Memeriksa apakah ini adalah load halaman pertama atau hasil dari navigasi back
            const isErrorNavigatingBack = window.performance && window.performance.navigation &&
                (window.performance.navigation.type === 2 ||
                    (performance.getEntriesByType &&
                        performance.getEntriesByType('navigation')[0].type === 'back_forward'));

            // Tracking ID unik untuk pesan error ini
            const errorMessageId = '{{ md5(session('error') . time()) }}';

            // Cek apakah pesan error ini sudah pernah ditampilkan
            if (!isErrorNavigatingBack && !localStorage.getItem('error_msg_shown_' + errorMessageId)) {
                // Tampilkan pesan hanya jika bukan dari navigasi back dan belum pernah ditampilkan
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "{{ session('error') }}",
                    showConfirmButton: true
                });

                // Tandai pesan ini sudah ditampilkan
                localStorage.setItem('error_msg_shown_' + errorMessageId, '1');

                // Hapus penanda setelah waktu tertentu
                setTimeout(() => {
                    localStorage.removeItem('error_msg_shown_' + errorMessageId);
                }, 10000); // 10 detik
            }

            // Kirim AJAX untuk menghapus session error agar tidak muncul lagi
            fetch("{{ url('/clear-flash-message') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
        </script>
    @endif

    <!-- Info Messages -->
    @if (session('info'))
        <script>
            // Memeriksa apakah ini adalah load halaman pertama atau hasil dari navigasi back
            const isInfoNavigatingBack = window.performance && window.performance.navigation &&
                (window.performance.navigation.type === 2 ||
                    (performance.getEntriesByType &&
                        performance.getEntriesByType('navigation')[0].type === 'back_forward'));

            // Tracking ID unik untuk pesan info ini
            const infoMessageId = '{{ md5(session('info') . time()) }}';

            // Cek apakah pesan info ini sudah pernah ditampilkan
            if (!isInfoNavigatingBack && !localStorage.getItem('info_msg_shown_' + infoMessageId)) {
                // Tampilkan pesan hanya jika bukan dari navigasi back dan belum pernah ditampilkan
                Swal.fire({
                    icon: 'info',
                    title: 'Informasi',
                    text: "{{ session('info') }}",
                    showConfirmButton: true
                });

                // Tandai pesan ini sudah ditampilkan
                localStorage.setItem('info_msg_shown_' + infoMessageId, '1');

                // Hapus penanda setelah waktu tertentu
                setTimeout(() => {
                    localStorage.removeItem('info_msg_shown_' + infoMessageId);
                }, 10000); // 10 detik
            }

            // Kirim AJAX untuk menghapus session info agar tidak muncul lagi
            fetch("{{ url('/clear-flash-message') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
        </script>
    @endif

    <!-- Pesan Checkout yang memerlukan login -->
    @if (session('cart_action') == 'checkout_login')
        <script>
            // Tracking ID unik untuk pesan checkout login
            const checkoutLoginId = '{{ md5('checkout_login' . time()) }}';

            // Cek apakah pesan ini sudah pernah ditampilkan
            if (!localStorage.getItem('msg_shown_' + checkoutLoginId)) {
                Swal.fire({
                    title: 'Login Diperlukan',
                    text: 'Anda perlu login atau daftar terlebih dahulu untuk melanjutkan proses pembayaran.',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#10B981',
                    cancelButtonColor: '#EF4444',
                    confirmButtonText: 'Login Sekarang',
                    cancelButtonText: 'Kembali ke Keranjang'
                }).then((result) => {
                    if (!result.isConfirmed) {
                        // Jika pengguna memilih batal, kembali ke halaman keranjang
                        window.location.href = "{{ route('cart.index') }}";
                    }
                });

                // Tandai pesan ini sudah ditampilkan
                localStorage.setItem('msg_shown_' + checkoutLoginId, '1');

                // Hapus penanda setelah waktu tertentu
                setTimeout(() => {
                    localStorage.removeItem('msg_shown_' + checkoutLoginId);
                }, 10000); // 10 detik
            }

            // Kirim AJAX untuk menghapus session checkout_login agar tidak muncul lagi
            fetch("{{ url('/clear-flash-message') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                title: '{{ is_array(session('success')) ? session('success')['title'] ?? 'Sukses' : 'Sukses' }}',
                text: '{{ is_array(session('success')) ? session('success')['text'] ?? session('success')[0] : session('success') }}',
                icon: '{{ is_array(session('success')) ? session('success')['icon'] ?? 'success' : 'success' }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Gagal',
                text: '{{ session('error') }}',
                icon: 'error',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    @stack('scripts')
</body>

</html>

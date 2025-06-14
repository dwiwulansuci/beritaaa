<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- ===== Tailwind CSS via CDN (tidak perlu Vite) ===== --}}
    <script src="https://cdn.tailwindcss.com?plugins=line-clamp"></script>

    {{-- (Opsional) Google Font Inter --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    {{-- (Opsional) file CSS lokal, kalau kamu punya --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="font-sans antialiased bg-gray-100">

    {{-- ===== Navbar / menu (include jika ada) ===== --}}
    @includeIf('layouts.navigation')

    {{-- ===== Judul halaman (slot header) ===== --}}
    @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    {{-- ===== Konten utama ===== --}}
    <main>
        {{ $slot }}
    </main>

    {{-- ===== Alpine.js via CDN (dipakai Jetstream/Breeze) ===== --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- (Opsional) JS lokal --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>

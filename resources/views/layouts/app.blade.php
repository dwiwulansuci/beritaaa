<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Judul halaman --}}
    <title>Berita</title>

    {{-- ===== Tailwind CSS via CDN ===== --}}
    <script src="https://cdn.tailwindcss.com?plugins=line-clamp"></script>

    {{-- (Opsional) Google Font Inter --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    {{-- (Opsional) file CSS lokal --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="font-sans antialiased bg-gray-100">

    {{-- ===== Navbar (jika ingin ditambahkan) ===== --}}
    {{-- <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600">Berita</a>
            <div>
                <a href="{{ route('news.create') }}" class="text-sm text-blue-500 hover:underline">Tambah Berita</a>
            </div>
        </div>
    </nav> --}}

    {{-- ===== Judul halaman dari slot $header ===== --}}
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

    {{-- Alpine.js (dipakai untuk interaksi kecil) --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- (Opsional) JS lokal --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>

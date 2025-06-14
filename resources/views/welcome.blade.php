<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Berita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 py-10">
<div class="max-w-5xl mx-auto">

    <h1 class="text-3xl font-bold text-center mb-6">Daftar Berita</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="text-right mb-6">
        <a href="{{ route('form.tambah') }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
            + Tambah Berita
        </a>
    </div>

    @forelse($news as $item)
        <div class="bg-white rounded shadow p-6 mb-6">
            @if($item->image)
                <img src="{{ asset('storage/'.$item->image) }}"
                     class="w-full h-64 object-cover rounded mb-4" alt="Gambar">
            @endif

            <h2 class="text-2xl font-bold mb-2">{{ $item->title }}</h2>
            <p class="text-gray-600 mb-4">
                Ditulis oleh <strong>{{ $item->author }}</strong> •
                {{ $item->published_at->format('d M Y H:i') }}
            </p>
            <p>{{ \Illuminate\Support\Str::limit(strip_tags($item->content), 200, '...') }}</p>
        </div>
    @empty
        <p class="text-center text-gray-600">Tidak ada berita tersedia.</p>
    @endforelse
</div>
</body>
</html>

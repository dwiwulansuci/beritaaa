<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Berita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 py-10">
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-center">Tambah Berita Baru</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label class="block font-medium mb-1">Judul</label>
        <input name="title" class="w-full border rounded px-3 py-2 mb-4" required>

        <label class="block font-medium mb-1">Isi Berita</label>
        <textarea name="content" rows="6" class="w-full border rounded px-3 py-2 mb-4" required></textarea>

        <label class="block font-medium mb-1">Penulis</label>
        <input name="author" class="w-full border rounded px-3 py-2 mb-4" required>

        <label class="block font-medium mb-1">Tanggal Publikasi</label>
        <input type="datetime-local" name="published_at" class="w-full border rounded px-3 py-2 mb-4" required>

        <label class="block font-medium mb-1">Gambar (opsional)</label>
        <input type="file" name="image" class="w-full border rounded px-3 py-2 mb-6">

        <div class="text-right">
            <a href="/" class="mr-4 px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</a>
            <button class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Simpan</button>
        </div>
    </form>
</div>
</body>
</html>

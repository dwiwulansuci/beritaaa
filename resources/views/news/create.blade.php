{{-- resources/views/news/edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">

                {{-- Tampilkan error validasi --}}
                @if ($errors->any())
                    <div class="mb-4 bg-red-100 text-red-700 px-4 py-3 rounded">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('news.update', $news) }}"
                      method="POST"
                      enctype="multipart/form-data"
                      class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Judul --}}
                    <div>
                        <label class="block font-medium mb-1">Judul</label>
                        <input type="text" name="title"
                               value="{{ old('title', $news->title) }}"
                               class="w-full border rounded px-3 py-2"
                               required>
                    </div>

                    {{-- Penulis --}}
                    <div>
                        <label class="block font-medium mb-1">Penulis</label>
                        <input type="text" name="author"
                               value="{{ old('author', $news->author) }}"
                               class="w-full border rounded px-3 py-2"
                               required>
                    </div>

                    {{-- Tanggal terbit --}}
                    <div>
                        <label class="block font-medium mb-1">Tanggal Terbit</label>
                        <input type="date" name="published_at"
                               value="{{ old('published_at', $news->published_at->format('Y-m-d')) }}"
                               class="w-full border rounded px-3 py-2"
                               required>
                    </div>

                    {{-- Gambar --}}
                    <div>
                        <label class="block font-medium mb-1">Gambar Baru (opsional)</label>
                        <input type="file" name="image"
                               accept=".jpg,.jpeg,.png"
                               class="w-full">
                        @if ($news->image)
                            <p class="text-sm mt-2">
                                Gambar saat ini:
                                <a href="{{ Storage::url($news->image) }}"
                                   target="_blank"
                                   class="text-blue-600 underline">
                                    lihat
                                </a>
                            </p>
                        @endif
                    </div>

                    {{-- Konten --}}
                    <div>
                        <label class="block font-medium mb-1">Konten</label>
                        <textarea name="content" rows="6"
                                  class="w-full border rounded px-3 py-2"
                                  required>{{ old('content', $news->content) }}</textarea>
                    </div>

                    {{-- Tombol --}}
                    <div class="flex gap-3">
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                            Update
                        </button>
                        <a href="{{ route('home') }}"
                           class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-6 rounded">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

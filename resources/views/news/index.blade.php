{{-- resources/views/news/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Berita Terbaru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Flash sukses --}}
            @if (session('success'))
                <div class="mb-6 px-4 py-3 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if($news->count())
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($news as $item)
                                <div
                                    class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">

                                    {{-- Gambar --}}
                                    @if($item->image)
                                        <img src="{{ Storage::url($item->image) }}"
                                             alt="{{ $item->title }}"
                                             class="w-full h-48 object-cover">
                                    @endif

                                    <div class="p-4">
                                        {{-- Judul --}}
                                        <h3 class="font-bold text-lg mb-2 line-clamp-2">
                                            {{ $item->title }}
                                        </h3>

                                        {{-- Meta --}}
                                        <p class="text-gray-600 text-sm mb-2">
                                            Oleh: {{ $item->author }}
                                            | {{ $item->published_at->format('d M Y') }}
                                        </p>

                                        {{-- Kutipan konten --}}
                                        <p class="text-gray-700 mb-4 line-clamp-3">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 150) }}
                                        </p>

                                        {{-- Tombol aksi --}}
                                        <div class="flex flex-wrap gap-2">
                                            <a href="{{ route('news.show', $item) }}"
                                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">
                                                Baca Selengkapnya
                                            </a>

                                            <a href="{{ route('news.edit', $item) }}"
                                               class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded text-sm">
                                                Edit
                                            </a>

                                            <form action="{{ route('news.destroy', $item) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin hapus berita ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded text-sm">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Pagination --}}
                        <div class="mt-8">
                            {{ $news->links() }}
                        </div>
                    @else
                        <div class="text-center py-8">
                            <h3 class="text-lg font-semibold text-gray-700">
                                Belum ada berita tersedia
                            </h3>
                            <p class="text-gray-500">
                                Silakan kembali lagi nanti untuk membaca berita terbaru.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

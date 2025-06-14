<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Berita Terbaru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($news->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($news as $item)
                                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                    @if($item->image)
                                        <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                                    @endif
                                    <div class="p-4">
                                        <h3 class="font-bold text-lg mb-2 line-clamp-2">{{ $item->title }}</h3>
                                        <p class="text-gray-600 text-sm mb-2">
                                            Oleh: {{ $item->author }} | {{ $item->published_at->format('d M Y') }}
                                        </p>
                                        <p class="text-gray-700 mb-4 line-clamp-3">{{ Str::limit(strip_tags($item->content), 150) }}</p>
                                        <a href="{{ route('news.show', $item) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">
                                            Baca Selengkapnya
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-8">
                            {{ $news->links() }}
                        </div>
                    @else
                        <div class="text-center py-8">
                            <h3 class="text-lg font-semibold text-gray-700">Belum ada berita tersedia</h3>
                            <p class="text-gray-500">Silahkan kembali lagi nanti untuk membaca berita terbaru.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

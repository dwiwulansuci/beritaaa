<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Berita') }}
            </h2>
            <div class="space-x-2">
                <a href="{{ route('admin.news.edit', $news) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Edit Berita
                </a>
                <form action="{{ route('admin.news.destroy', $news) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Hapus Berita
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <a href="{{ route('admin.news.index') }}" class="text-blue-500 hover:text-blue-700">
                            ← Kembali ke Daftar Berita
                        </a>
                    </div>

                    <article>
                        <header class="mb-6">
                            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $news->title }}</h1>
                            <div class="flex items-center text-gray-600 text-sm mb-4">
                                <span>Oleh: {{ $news->author }}</span>
                                <span class="mx-2">|</span>
                                <span>{{ $news->published_at->format('d F Y, H:i') }} WIB</span>
                                <span class="mx-2">|</span>
                                <span>Dibuat oleh: {{ $news->user->name }}</span>
                            </div>
                        </header>

                        @if($news->image)
                            <div class="mb-6">
                                <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}" class="w-full h-auto rounded-lg shadow-md">
                            </div>
                        @endif

                        <div class="prose max-w-none">
                            {!! nl2br(e($news->content)) !!}
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

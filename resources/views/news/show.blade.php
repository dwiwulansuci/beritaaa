<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <a href="{{ route('news.index') }}" class="text-blue-500 hover:text-blue-700">
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

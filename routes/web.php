<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\News;

/* ──────────────────────────────────────────
|  HALAMAN UTAMA – Daftar Berita
| ────────────────────────────────────────── */
Route::get('/', function () {
    $news = News::latest()->get();
    return view('welcome', compact('news'));
});

/* ──────────────────────────────────────────
|  TAMBAH BERITA (publik)
| ────────────────────────────────────────── */
Route::view('/tambah-berita', 'form-tambah')->name('form.tambah');

Route::post('/tambah-berita', function (Request $request) {
    $request->validate([
        'title'        => 'required|string|max:255',
        'content'      => 'required|string',
        'author'       => 'required|string|max:100',
        'image'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'published_at' => 'required|date',
    ]);

    $path = $request->file('image')
        ? $request->file('image')->store('news_images', 'public')
        : null;

    News::create([
        'title'        => $request->title,
        'content'      => $request->content,
        'author'       => $request->author,
        'image'        => $path,
        'published_at' => $request->published_at,
    ]);

    return redirect('/')->with('success', 'Berita berhasil ditambahkan!');
})->name('news.store');

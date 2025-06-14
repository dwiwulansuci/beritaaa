<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES – Manajemen Berita
|--------------------------------------------------------------------------

  Struktur:
    GET   /                 -> daftar berita (homepage)
    GET   /news             -> daftar berita (URL konvensional)
    GET   /news/create      -> form tambah
    POST  /news             -> simpan data baru
    GET   /news/{news}      -> detail berita
    GET   /news/{news}/edit -> form edit
    PUT   /news/{news}      -> update data
    DELETE /news/{news}     -> hapus data
    GET   /dashboard        -> redirect ke beranda (menghilangkan error route dashboard)
*/

/* ──────────────────────────────────────────
|  1.  HALAMAN UTAMA  (Daftar Berita)
| ────────────────────────────────────────── */
Route::get('/', [NewsController::class, 'index'])->name('home');

/* (Opsional) URL kedua untuk daftar yang lebih “RESTful” */
Route::get('/news', [NewsController::class, 'index'])->name('news.index');

/* ──────────────────────────────────────────
|  2.  TAMBAH BERITA
| ────────────────────────────────────────── */
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news', [NewsController::class, 'store'])->name('news.store');

/* ──────────────────────────────────────────
|  3.  DETAIL BERITA
| ────────────────────────────────────────── */
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

/* ──────────────────────────────────────────
|  4.  EDIT BERITA
| ────────────────────────────────────────── */
Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::put('/news/{news}', [NewsController::class, 'update'])->name('news.update');

/* ──────────────────────────────────────────
|  5.  HAPUS BERITA
| ────────────────────────────────────────── */
Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

/* ──────────────────────────────────────────
|  6.  DASHBOARD (mengatasi error Route [dashboard] not defined)
| ────────────────────────────────────────── */
Route::get('/dashboard', function () {
    // Saat ini cuma redirect ke beranda. Nanti bisa diganti view dashboard sungguhan.
    return redirect()->route('home');
})->name('dashboard');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES – Manajemen Berita
|--------------------------------------------------------------------------
|
|  GET   /                 -> daftar berita (homepage)
|  GET   /news             -> daftar berita (URL konvensional)
|  GET   /news/create      -> form tambah
|  POST  /news             -> simpan data baru
|  GET   /news/{news}      -> detail berita
|  GET   /news/{news}/edit -> form edit
|  PUT   /news/{news}      -> update data
|  DELETE /news/{news}     -> hapus data
|  GET   /dashboard        -> redirect ke beranda (dummy)
|  GET   /login            -> redirect ke beranda (dummy)
|  GET   /register         -> redirect ke beranda (dummy)
|
*/

/* 1. HALAMAN UTAMA */
Route::get('/', [NewsController::class, 'index'])->name('home');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');

/* 2. TAMBAH BERITA */
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news',       [NewsController::class, 'store'])->name('news.store');

/* 3. DETAIL BERITA */
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

/* 4. EDIT BERITA */
Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::put('/news/{news}',      [NewsController::class, 'update'])->name('news.update');

/* 5. HAPUS BERITA */
Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

/* 6. ROUTE DUMMY – dashboard, login, register */
Route::get('/dashboard', fn () => redirect()->route('home'))->name('dashboard');
Route::get('/login',     fn () => redirect()->route('home'))->name('login');
Route::get('/register',  fn () => redirect()->route('home'))->name('register');

<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /* ---------- LIST / SHOW ---------- */
    public function index()
    {
        $news = News::latest('published_at')->paginate(12);
        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    /* ---------- TAMBAH ---------- */
    public function create()
    {
        return view('news.create');           // buat view form tambah (simple)
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'required',
            'author'       => 'required|string|max:100',
            'published_at' => 'required|date',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                             ->store('news_images', 'public');  // ex: news_images/xxx.jpg
        }

        News::create($data);
        return redirect()->route('home')->with('success','Berita ditambahkan');
    }

    /* ---------- EDIT ---------- */
    public function edit(News $news)
    {
        return view('news.edit', compact('news')); // buat view form edit
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'required',
            'author'       => 'required|string|max:100',
            'published_at' => 'required|date',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ganti gambar kalau upload baru
        if ($request->hasFile('image')) {
            // hapus lama
            if ($news->image && Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')
                             ->store('news_images', 'public');
        }

        $news->update($data);
        return redirect()->route('home')->with('success','Berita di‑update');
    }

    /* ---------- DELETE ---------- */
    public function destroy(News $news)
    {
        if ($news->image && Storage::disk('public')->exists($news->image)) {
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();
        return back()->with('success','Berita dihapus');
    }
}

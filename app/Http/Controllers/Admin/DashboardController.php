<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalNews = News::count();
        $totalUsers = User::where('role', 'user')->count();
        $recentNews = News::with('user')
            ->latest('published_at')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('totalNews', 'totalUsers', 'recentNews'));
    }
}

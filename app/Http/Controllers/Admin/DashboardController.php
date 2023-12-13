<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $sumUsers = User::count();
        $sumPosts = Post::count();
        $sumNews = News::count();
        return view('admin.pages.dashboard', compact('sumUsers', 'sumPosts', 'sumNews'));
    }
}

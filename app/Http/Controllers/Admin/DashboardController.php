<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $sumUser = User::count();
        $sumPost = Post::where('type', 1)->count();
        $sumNews = Post::where('type', 0)->count();
        return view('admin.pages.dashboard', compact('sumUser', 'sumPost'));
    }

    
}

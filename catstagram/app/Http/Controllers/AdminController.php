<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard'); 
    }
    public function managePosts(){
        $posts = Post::with('user')->get();
        return view('admin.manage', compact('posts'));
    }
}

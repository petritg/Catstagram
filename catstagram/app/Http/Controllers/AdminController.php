<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        $posts = Post::with('user')->get();
        return view('admin.dashboard', compact('posts')); // Adjust view path as needed
    }
}

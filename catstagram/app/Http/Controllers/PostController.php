<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //Show all listings
    public function index() {
        return view('posts', [
            'posts' => Post::all()
        ]);
    }

    //Show single listing
    public function show(Post $post) {
        return view('post', [
            'post' => $post
        ]);
    }
}

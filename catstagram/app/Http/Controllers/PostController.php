<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;

class PostController extends Controller
{
    //Show all listings
    public function index() {
        
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['tag', 'search']))->get()
        ]);
    }

    //Show single listing
    public function show(Post $post) {
        return view('posts/show', [
            'post' => $post
        ]);
    }

    //Show Create Form
    public function create() {
        return view('posts.create');
    }

    //Store Post Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'location' => 'required', 
            'breed' => 'required',
            'tags' => 'required',
            'description' => 'required',
            

        ]);

        $formFields['likes'] = 0;

        Post::create($formFields);


        return redirect('/')->with('message', 'Listing created successfully');
    }

}

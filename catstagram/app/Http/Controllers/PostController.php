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
            'posts' => Post::latest()->filter(request(['tag', 'search']))->paginate(6)
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
        
        if($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $formFields['likes'] = 0;

        $formFields['user_id'] = auth()->id();

        Post::create($formFields);


        return redirect('/')->with('message', 'Post gepubliceerd!');
    }

    //Show Edit Form
    public function edit (Post $post) {
        
        return view('posts.edit', ['post' => $post]);
    }

    //Update Post Data
    public function update(Request $request, Post $post) {

        // Make sure logged in user is owner
        if($post->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'location' => 'required', 
            'breed' => 'required',
            'tags' => 'required',
            'description' => 'required',
            

        ]);
        
        if($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $formFields['likes'] = 0;

        $post->update($formFields);


        return back()->with('message', 'Post geüpdatet!');
    }

    // Delete Post
    public function destroy(Post $post) {
        
        // Make sure logged in user is owner
        if($post->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $post->delete();
        return redirect('/')->with ('message', 'Post verwijderd!');
    }

    // Manage Posts
    public function manage() {
        return view('posts.manage', ['posts' => auth()->user()->posts()->get()]);
    }
}

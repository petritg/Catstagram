<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// All Posts
Route::get('/', function () {
    return view('posts', [
        'heading' => 'Latest Posts',
        'posts' => Post::all()
    ]);
});

//Single Post
Route::get('/posts/{id}', function($id){
    return view('post', [
        'post' => Post::find($id)
    ]);
});
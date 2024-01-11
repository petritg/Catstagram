<?php

use App\Http\Controllers\PostController;
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
Route::get('/', [PostController::class, 'index']);

//Show Create Form
Route::get('/posts/create', [PostController::class, 'create']);

//Single Listing Data
Route::post('/posts', [PostController::class, 'store']);


//Single Post
Route::get('/posts/{post}', [PostController::class, 'show']);
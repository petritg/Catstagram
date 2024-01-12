<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

//Single Post Data
Route::post('/posts', [PostController::class, 'store']);

//Show Edit Form
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);

//Update Post
Route::put('/posts/{post}', [PostController::class, 'update']);

//Delete Post
Route::delete('/posts/{post}', [PostController::class, 'destroy']);

//Single Post
Route::get('/posts/{post}', [PostController::class, 'show']);

//Show Register/Create Form
Route::get('/register', [UserController::class, 'create']);

//Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout']);
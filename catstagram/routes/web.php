<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CategoryController;
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

// About page
Route::get('/about', [PostController::class, 'about']);

//Show Create Form
Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');

//Single Post Data
Route::post('/posts', [PostController::class, 'store'])->middleware('auth');

//Show Edit Form
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->middleware('auth');

//Update Post
Route::put('/posts/{post}', [PostController::class, 'update'])->middleware('auth');

//Delete Post
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->middleware('auth');

// Manage Posts
Route::get('/posts/manage', [PostController::class, 'manage'])->middleware('auth');

//Single Post
Route::get('/posts/{post}', [PostController::class, 'show']);

//Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Show User
Route::get('/users/showprofile', [UserController::class, 'showProfile'])->middleware('auth')->name('profile');

// Update user
Route::put('/profile', [UserController::class, 'updateProfile'])->middleware('auth')->name('editprofile');

// All news routes
Route::resource('news', NewsController::class);

// All FAQ routes
Route::resource('faqs', FAQController::class);
Route::resource('categories', CategoryController::class);

// Admin routes
Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware('admin');
Route::get('/dashboard/manage', [AdminController::class, 'managePosts'])->middleware('admin');
Route::get('/dashboard/messages', [AdminController::class, 'showMessages'])->middleware('admin')->name('admin.messages');

// Get Contactform
Route::get('/contactpage', [PostController::class, 'contactpage']);

// Post Contactform
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Delete message
Route::delete('/admin/messages/{message}', [MessageController::class, 'destroy'])->name('admin.messages.destroy')->middleware('admin');


// Route::get('admin', function () {
//     return view('admin.index');
// })->middleware(['auth', 'role:admin'])->name('admin');


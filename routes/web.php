<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('auth.loginForm');
});

Route::get('/login', [UserController::class, 'loginForm'])->name('auth.loginForm');
Route::post('/login', [UserController::class, 'login'])->name('auth.login');
Route::get('/register', [UserController::class, 'registerForm'])->name('auth.registerForm');
Route::post('/register', [UserController::class, 'register'])->name('auth.register');
Route::post('/logout', [UserController::class, 'logout'])->name('auth.logout');

Route::group(['middleware' => 'auth'], function () {
    
    Route::resource('categories', CategoryController::class);

    Route::resource('posts', PostController::class);
    Route::post('/posts/{id}/comment', [PostController::class, 'commentPost'])->name('posts.comment');
    Route::post('/posts/search', [PostController::class, 'searchPost'])->name('posts.search');
});




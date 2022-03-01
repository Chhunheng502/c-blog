<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CookieController;

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

Route::get('/home', function() {

    return view('home', [
        'posts' => App\Models\Post::all(),
    ]);

})->name('home');

// Change to use method binding instead
Route::get('/posts/{id}', function($id) {

    return view('posts.show', [
        'post' => App\Models\Post::find($id),
        'comments' => App\Models\Post::findOrFail($id)->getComments,
    ]);

})->name('posts.show');

Route::post('/posts/{id}/comment', function(Request $request, $id) {

    $comment = new App\Models\Comment();
    $comment->user_id = Auth::id();
    $comment->post_id = $id;
    $comment->content = $request->comment_content;

    $comment->save();

    return redirect()->back();

})->name('posts.comment');

Route::post('/posts/search', function(Request $request) {

    $posts = App\Models\Post::all();

    $found_posts = [];

    foreach($posts as $post)
    {
        if(str_contains(strtolower($post->title), strtolower($request->search)))
        {
            array_push($found_posts, $post);
        }
    }

    if(empty($found_posts))
    {
        foreach($posts as $post)
        {
            if(str_contains(strtolower($post->content), strtolower($request->search)))
            {
                array_push($found_posts, $post);
            }
        }
    }

    return view('home', [
        'posts' => $found_posts,
    ]);

})->name('posts.search');

Route::get('/categories/{category}', function($id) {

    return view('categories.show', [
        'categories' => App\Models\Category::find($id),
    ]);

})->name('categories.show');
//-----------------------------------------

// Route::resource('categories', CategoryController::class);
// Route::resource('posts', PostController::class);




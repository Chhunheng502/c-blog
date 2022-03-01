<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Gate::allows('isAuthor'))
        {
            return view('posts.index', [
                'posts' => Post::latest()->filter(
                    request(['search', 'category', 'author'])
                )->paginate(5)->withQueryString(),
            ]);
        }

        return view('posts.index', [
            'posts' => Post::latest()->where('user_id', Auth::id())->filter(
                request(['search', 'category', 'author'])
            )->paginate(5)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('isAuthor'))
        {
            return redirect()->back()->with('unauthorized', "You're not authorized to access this page");
        }

        return view('admin.posts.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Gate::allows('isAuthor'))
        {
            return redirect()->back();
        }

        // $post_path = $request->post_image?->store('images', 's3');

        $query = Category::find($request->category_id)->posts()->create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
            // 'image_url' => Storage::url($post_path),
            'slug' => Str::slug($request->title),
        ]);

        if($query)
        {
            return redirect()->route('posts.index');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(!Gate::allows('view', $post))
        {
            return redirect()->back();
        }

        return view('admin.posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if(!Gate::allows('update', $post))
        {
            return redirect()->back();
        }

        $post->title = $request->title;
        $post->content = $request->content;

        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(!Gate::allows('delete', $post))
        {
            return redirect()->back();
        }

        $post->delete();

        return redirect()->route('posts.index');
    }

    public function commentPost(Request $request, $id)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->post_id = $id;
        $comment->content = $request->comment_content;
    
        $comment->save();
    
        return redirect()->back();
    }
}

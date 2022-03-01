<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', [
            'posts' => $posts,
            'user' => Auth::user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('isAdmin'))
        {
            return redirect()->back();
        }

        $categories = Auth::user()->getCategories;

        return view('posts.create', [
            'categories' => $categories
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
        if(!Gate::allows('isAdmin'))
        {
            return redirect()->back();
        }

        $query = Category::find($request->category_id)->getPosts()->create([
            'title' => $request->title,
            'content' => $request->content
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
            'comments' => $post->getComments,
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

        return view('posts.edit', [
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

    public function searchPost()
    {
        $posts = Post::latest();

        if(request('search'))
        {
            $posts->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('content', 'like', '%' . request('search') . '%');
        }
    
        return view('posts.index', [
            'posts' => $posts->get(),
        ]);
    }
}

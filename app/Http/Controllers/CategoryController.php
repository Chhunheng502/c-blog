<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        
        if(!Gate::allows('is-admin'))
        {
            return redirect()->route('posts.index');
        }

        return view('categories.index', [
            'categories' => $categories,
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
        if(!Gate::allows('is-admin'))
        {
            return redirect()->route('posts.index');
        }

        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Gate::allows('is-admin'))
        {
            return redirect()->route('posts.index');
        }

        $query = Category::create([
            'user_id' => Auth::id(),
            'name' => $request->name
        ]);

        if($query)
        {
            // return view('categories.index'); // this doesn't pass a newly updated data to categories.index, which resulted in undefined

            return redirect()->route('categories.index');
        }

        return view('categories.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if(!Gate::allows('is-admin'))
        {
            return redirect()->route('posts.index');
        }

        return view('categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if(!Gate::allows('is-admin'))
        {
            return redirect()->route('posts.index');
        }

        $category->name = $request->name;

        $category->save();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if(!Gate::allows('is-admin'))
        {
            return redirect()->route('posts.index');
        }

        $category->getPosts()->where('category_id', $category->id)->delete();
        $category->delete();

        return redirect()->route('categories.index');
    }
}

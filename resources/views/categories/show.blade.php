@extends('layout.general')

@section('title')
    Category Page
@endsection

@section('content')
    <div class="blog-layout">
        @include('layout.navbar')
        @foreach ($categories->getPosts as $post)
            <div>
                <h2> {{ $post->title }} </h2>
                <div class="writer-profile">
                    <img src={{ $post->getCategory->getAuthor->profile_picture }} alt="profile">
                    <div>
                        <h5> {{ $post->getCategory->getAuthor->name }} </h5>
                        <p> {{ App\Models\Post::findElapsedTime($post->updated_at) }} </p>
                    </div>
                </div>
                <div>
                    Category: <a href="{{ route('categories.show', $post->getCategory->id) }}"> {{ $post->getCategory->name }} </a>
                </div>
                <p class="excerpt"> {{ $post->content }} </p>
                <a href="{{ route('posts.show', $post->id) }}"> Read more </a>
            </div>
        @endforeach
    </div>
@endsection
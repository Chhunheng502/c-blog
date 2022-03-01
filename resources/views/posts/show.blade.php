@extends('layout.general')

@section('title')
    Post Page
@endsection

@section('content')
    <div class="blog-layout">
        @include('layout.navbar')
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
        <p> {{ $post->content }} </p>
        <a href="{{ route('home') }}"> Go back </a>
        <form action="{{ route('posts.comment', $post->id) }}" method="POST">
            @csrf
            <input type="text" name="comment_content" id="comment_content" class="form-control" placeholder="Comment on post">
            <button type="submit" class="form-control"> Enter </button>
        </form >
        <div>
            @foreach ($comments as $comment)
                <div style="display:flex">
                    <div class="writer-profile" style="align-self:baseline;margin:5px;padding:5px">
                        <img src={{ $comment->getUser->profile_picture }} alt="profile">
                    </div>
                    <div>
                        <div>
                            <h5 style="margin-bottom:0px"> {{ $comment->getUser->name }} </h5>
                            <p style="margin-top:0px;color:gray"> {{ App\Models\Post::findElapsedTime($comment->updated_at) }} </p>
                        </div>
                        <p>
                            {{ $comment->content }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
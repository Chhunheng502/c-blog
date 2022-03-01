
<x-layout>
    <x-slot name="title">
        Show Post
    </x-slot>
    <x-slot name="content">
        <div class="container px-2 py-4">
            <x-post-card :post="$post" :show="true" />
            <a href="{{ route('posts.index') }}"> Go back </a>
            <form action="{{ route('posts.comment', $post->id) }}" method="POST" class="form-inline my-4">
                @csrf
                <input type="text" name="comment_content" id="comment_content" class="form-control w-75 mr-2" placeholder="Comment on post">
                <button type="submit" class="btn btn-primary"> Enter </button>
            </form >
            <div>
                @foreach ($post->comments as $comment)
                    <x-comment :comment="$comment" />
                @endforeach
            </div>
        </div>
    </x-slot>
</x-layout>
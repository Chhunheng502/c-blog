
<x-layout>
    <x-slot name="title">
        Edit Post
    </x-slot>
    <x-slot name="content">
        <div class="w-50 mx-auto pt-5" style="min-height:100vh">
            <form action="{{ route('posts.update', $post->slug) }}" method="POST" class="form-group center-item w-50">
                @csrf
                @method('put')
                <div class="text-center">
                    <h3> Edit post </h3>
                </div>
                <div class="mb-2">
                    <label for="title"> Title </label>
                    <input name="title" id="title" class="form-control" value="{{ $post->title }}">
                </div>
                <div class="mb-2">
                    <label for="content"> Content </label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control"> {{ $post->content }} </textarea>
                </div>
                <div class="text-center mb-2">
                    <button type="submit" class="btn btn-primary"> Submit </button>
                </div>
                <a href="{{ route('posts.index') }}"> Go back </a>
            </form>
        </div>
    </x-slot>
</x-layout>
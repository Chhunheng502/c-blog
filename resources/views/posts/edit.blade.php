
<x-layout>
    <x-slot name="title">
        Edit Post
    </x-slot>
    <x-slot name="content">
        <form action="{{ route('posts.update', $post->id) }}" method="POST" class="form-group center-item w-50">
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
    </x-slot>
</x-layout>
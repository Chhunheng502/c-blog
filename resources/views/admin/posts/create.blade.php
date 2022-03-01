

<x-layout>
    <x-slot name="title">
        Create Post
    </x-slot>
    <x-slot name="content">
        <div class="w-50 mx-auto pt-5" style="min-height:100vh">
            <form action="{{ route('posts.store') }}" method="POST" class="form-group">
                @csrf
                <div class="text-center">
                    <h3> Create new post </h3>
                </div>
                <div class="mb-2">
                    <select name="category_id" id="category_id" class="form-control">
                        <option> Choose category </option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label for="post_image">Upload Image</label>
                    <input type="file" name="post_image" id="post_image" class="form-control">
                </div>
                <div class="mb-2">
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
                </div>
                <div class="mb-2">
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control" placeholder="Enter content"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Create</button> 
                </div>
            </form>
        </div>
    </x-slot>
</x-layout>
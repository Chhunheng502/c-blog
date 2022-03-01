

<x-layout>
    <x-slot name="title">
        Edit Category
    </x-slot>
    <x-slot name="content">
        <div class="w-50 mx-auto pt-5" style="min-height:100vh">
            <form action="{{ route('categories.update', $category->slug) }}" method="POST" class="form-group">
                @csrf
                @method('put')
                <div class="text-center">
                    <h3> Edit category </h3>
                </div>
                <div class="mb-2">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{ $category->name }}">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </x-slot>
</x-layout>
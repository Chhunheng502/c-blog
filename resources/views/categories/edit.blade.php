

<x-layout>
    <x-slot name="title">
        Edit Category
    </x-slot>
    <x-slot name="content">
        <form action="{{ route('categories.update', $category->id) }}" method="POST" class="form-group center-item">
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
    </x-slot>
</x-layout>
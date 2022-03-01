

<x-layout>
    <x-slot name="title">
        Create Category
    </x-slot>
    <x-slot name="content">
        <form action="{{ route('categories.store') }}" method="POST" class="form-group center-item">
            @csrf
            <div class="text-center">
                <h3> Create new category </h3>
            </div>
            <div class="mb-2">
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </x-slot>
</x-layout>
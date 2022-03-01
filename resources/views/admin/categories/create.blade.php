

<x-layout>
    <x-slot name="title">
        Create Category
    </x-slot>
    <x-slot name="content">
        <div class="w-50 mx-auto pt-5" style="min-height:100vh">
            <form action="{{ route('categories.store') }}" method="POST" class="form-group">
                @csrf
                <div class="text-center">
                    <h3> Create new category </h3>
                </div>
                <div class="mb-2">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">

                    @error('name')
                        <p class="text-danger mt-1"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </x-slot>
</x-layout>
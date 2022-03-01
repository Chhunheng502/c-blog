

<x-layout>
    <x-slot name="title">
        Category Page
    </x-slot>
    <x-slot name="content">
        <table class="table w-50 center-item" style="top:30%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td> <input type="text" name="category_name" id="category_name" class="form-control" value="{{ $category->name }}"> </td>
                        <td>
                            <div class="d-flex">
                                <form action="{{ route('categories.edit', $category->id) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary mr-2"> Edit </button>
                                </form>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"> Delete </a>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-slot>
</x-layout>
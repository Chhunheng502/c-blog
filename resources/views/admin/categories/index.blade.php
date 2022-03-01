

<x-layout>
    <x-slot name="title">
        Category Page
    </x-slot>
    <x-slot name="content">
        <div class="w-50 mx-auto pt-5" style="min-height:100vh">
            <table class="table">
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
                            <td> 
                                <input 
                                    type="text" 
                                    name="category_name" 
                                    id="category_name" 
                                    class="form-control" 
                                    value="{{ $category->name }}"
                                    disabled
                                > 
                            </td>
                            <td>
                                <div class="d-flex">
                                    @can('isAdmin')
                                        <form action="{{ route('categories.edit', $category->slug) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-primary mr-2"> Edit </button>
                                        </form>
                                        <form action="{{ route('categories.destroy', $category->slug) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"> Delete </a>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>
</x-layout>
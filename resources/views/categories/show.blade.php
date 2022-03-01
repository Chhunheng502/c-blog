
<x-layout>
    <x-slot name="title">
        Category {{ $categories->id }}
    </x-slot>
    <x-slot name="content">
        <div class="container px-2 py-4">
            @foreach ($categories->getPosts as $post)
                <x-post-card :post="$post" />
            @endforeach
        </div>
    </x-slot>
</x-layout>
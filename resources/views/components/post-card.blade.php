@props(['post','show' => false])


<div class="row post my-4 border" {{ $show == true ? '' : 'x-data' }}>
    <div class="{{ $show == true ? 'col-12' : 'col-md-6' }}">
        <img src="{{ $post->image_url }}" width="100%" height="{{ $show == true ? 'auto' : '350px' }}" alt="" style="object-fit: cover">
    </div>
    <div class="{{ $show == true ? 'col-12 p-3' : 'col-md-6 p-3 hover-post' }}" x-on:click="window.location='{{ route('posts.show', $post->slug) }}'">
        <div class="d-flex">
            <div class="mr-2">
                <img src="{{ $post->author->profile_picture }}" alt="profile" width="50px" height="50px" class="rounded-circle">
            </div>
            <div>
                <h5 class="mb-0"> {{ $post->author->name }} </h5>
                <p class="mt-0 text-secondary"> {{ $post->updated_at->diffForHumans() }} </p>
            </div>
        </div>
        <div>
            Category: <a href="/posts?category={{ $post->category->slug }}"> {{ $post->category->name }} </a>
        </div>
        <div class="my-3">
            <h2> {{ $post->title }} </h2>
            <p class="{{ $show == true ? '' : 'excerpt' }}"> {!! nl2br(e($post->content)) !!} </p>
        </div>

        @can('view', $post)
            <div class="{{ $show == true ? 'd-none' : 'd-flex' }}">
                <form action="{{ route('posts.edit', $post->slug) }}" method="GET">
                    @csrf
                    <button class="btn btn-primary mr-2"> Edit </button>
                </form>
                @can('isAuthor')
                    <form action="{{ route('posts.destroy', $post->slug) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"> Delete </a>
                    </form>
                @endcan
            </div>
        @endcan
    </div>
</div>
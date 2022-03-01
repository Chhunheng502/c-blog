@props(['post','show' => false])


<div class="row post my-4 border" {{ $show == true ? '' : 'x-data' }}>
    <div class="{{ $show == true ? 'col-12' : 'col-md-6' }}">
        <img src="https://images.pexels.com/photos/2246476/pexels-photo-2246476.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" width="100%" height="100%" alt="">
    </div>
    <div class="{{ $show == true ? 'col-12 p-3' : 'col-md-6 p-3 hover-post' }}" x-on:click="window.location='{{ route('posts.show', $post->id) }}'">
        <div class="d-flex">
            <div class="mr-2">
                <img src={{ $post->getCategory->getAuthor->profile_picture }} alt="profile" width="50px" height="50px" class="rounded-circle">
            </div>
            <div>
                <h5 class="mb-0"> {{ $post->getCategory->getAuthor->name }} </h5>
                <p class="mt-0 text-secondary"> {{ $post->updated_at->diffForHumans() }} </p>
            </div>
        </div>
        <div>
            Category: <a href="{{ route('categories.show', $post->getCategory->id) }}"> {{ $post->getCategory->name }} </a>
        </div>
        <div class="my-3">
            <h2> {{ $post->title }} </h2>
            <p class="{{ $show == true ? '' : 'excerpt' }}"> {{ $post->content }} </p>
        </div>

        @can('view', $post)
            <div class="{{ $show == true ? 'd-none' : 'd-flex' }}">
                <form action="{{ route('posts.edit', $post->id) }}" method="GET">
                    @csrf
                    <button class="btn btn-primary mr-2"> Edit </button>
                </form>
                @can('isAdmin')
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"> Delete </a>
                    </form>
                @endcan
            </div>
        @endcan
    </div>
</div>

<x-layout>
    <x-slot name="title">
        Post Page
    </x-slot>
    <x-slot name="content">
        <div class="position-relative" style="height:600px">
            <img src="https://images.pexels.com/photos/2901209/pexels-photo-2901209.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" width="100%" height="100%" alt="">
            <div class="header-desc center-item">
                <h5> Hello Friends, Welcome to </h5>
                <h1> C-Blog </h1>
                <p>
                    Far far away, behind the word mountains, 
                    far from the countries Vokalia and Consonantia, there live the blind texts. 
                    Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.
                </p>
            </div>
            <x-alert-message name="successfully logined"> </x-alert-message>
            <x-alert-message name="unauthorized"> </x-alert-message>
        </div>
        <div class="container px-2 py-4">
            @if ($posts->count())
                @foreach ($posts as $post)
                    <x-post-card :post="$post" />
                @endforeach
                <div>
                    {{ $posts->links() }}
                </div>
            @else
                <p class="text-center">No posts yet. Please check back later.</p>
            @endif
        </div>
    </x-slot>
</x-layout>
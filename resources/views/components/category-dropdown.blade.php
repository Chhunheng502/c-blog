

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
    <div class="dropdown-menu" aria-labelledby="dropdownId">
        @foreach ( $categories as $category)
            <a class="dropdown-item" href="/posts?category={{ $category->slug }}">{{ $category->name }}</a>
        @endforeach
    </div>
</li>


<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Authors</a>
    <div class="dropdown-menu" aria-labelledby="dropdownId">
        @foreach ($authors as $author)
            <a class="dropdown-item" href="/posts?author={{ $author->name }}">{{ $author->name }}</a>
        @endforeach
    </div>
</li>
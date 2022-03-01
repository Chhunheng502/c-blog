

<nav class="navbar navbar-expand-md navbar-light">
    <a class="navbar-brand" href="{{ route('posts.index') }}">C-Blog</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('posts.index') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            @if (Auth::user()->role !== 'admin')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        @foreach ( App\Models\Category::all() as $category)
                            <a class="dropdown-item" href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="{{ route('categories.index') }}"> View all </a>
                        <a class="dropdown-item" href="{{ route('categories.create') }}"> Create new </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.create') }}">Create Post</a>
                </li>
            @endif
        </ul>
        <div class="dropdown mr-4">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    {{ Auth::user()->name }}
            </button>
            <div class="dropdown-menu" aria-labelledby="triggerId">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Notification</a>
                <a class="dropdown-item" href="#">Setting</a>
                <form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn dropdown-item"> Logout </button>
                </form>
            </div>
        </div>
        <form action="{{ route('posts.search') }}" method="POST" class="form-inline my-2 my-lg-0">
            @csrf
            <input class="form-control mr-sm-2" type="text" name="search" id="search" placeholder="Search" value="{{ request('search') }}">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>


<nav class="navbar">
    {{-- <a href="#"> C-Blog </a>
    <button></button> --}}
    <div>
        <ul>
            <li> <a href="#" class="disabled" style="color:black"> C-Blog </a> </li>
            <li> <a href="{{ route('home') }}"> Home </a> </li>
            <li> <a href="#"> Notification </a> </li>
            <li>
                <form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit" style="border:none;padding:2px;margin:0px;background:none"> <a style="cursor:pointer"> Logout </a> </button>
                </form>
            </li>
            <li style="float:right">
                {{-- <div class="writer-profile">
                    <img src="{{ asset('img/pexels-pixabay-461940.jpg') }}" alt="profile">
                    <div>
                        <h5> Chhunheng Leng </h5>
                    </div>
                </div> --}}
                <div style="display:flex">
                    <a href="#" class="disabled" style="color:gray"> {{ Auth::user()->name }} </a>
                    <form action="{{ route('posts.search') }}" method="POST" style="margin-top:5px">
                        @csrf
                        <input type="text" name="search" id="search" class="form-control" style="padding:10px;margin:0" placeholder="Search post">
                        <button type="submit" class="form-control" style="float:right;padding:9px;margin:0"> <i class="fa fa-search"></i> </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
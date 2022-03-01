@extends('layout.general')

@section('title')
    Login Page
@endsection

@section('content')
    <div class="form-style center-item">
        <h1 class="font-style"> Welcome to C-Blog </h1> 
        <form action="{{ route('auth.login') }}" method="POST">
            @csrf
            <div>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" value={{ $email_cookie }}>
            </div>
            <div>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" value={{ $password_cookie }}>
            </div>
            <div class="form-inline">
                <input type="checkbox" name="remember_me" id="remember_me" checked>
                <label for="remember_me"> Remember me </label>
            </div>
            <div>
                <button type="submit"> Login </button>
            </div>
            <hr>
            <p> Not registered yet? <a href="{{ route('auth.registerForm') }}"> Create account now </a> </p>
        </form>
    </div>
@endsection
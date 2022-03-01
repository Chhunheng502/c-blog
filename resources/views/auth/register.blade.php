@extends('layout.general')

@section('title')
    Registration Page
@endsection

@section('content')
    <div class="form-style center-item">
        <h1 class="font-style"> Create an account </h1> 
        <form action="{{ route('auth.register') }}" method="POST">
            @csrf
            <div>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter username">
            </div>
            <div>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter email">
            </div>
            <div>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
            </div>
            <div>
                <input type="password" name="confirm password" id="confirm password" class="form-control" placeholder="Enter password again">
            </div>
            <div>
                <button type="submit"> Create </button>
            </div>
        </form>
    </div>
@endsection
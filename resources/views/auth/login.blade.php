
<x-layout>
    <x-slot name="title">
        Login Page
    </x-slot>
    <x-slot name="content">
        <div class="center-item">
            <h1> Welcome to C-Blog </h1> 
            <form action="{{ route('auth.login') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" value={{ $email_cookie }}>
                </div>
                <div class="mb-2">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" value={{ $password_cookie }}>
                </div>
                <div class="form-inline">
                    <input type="checkbox" name="remember_me" id="remember_me" checked>
                    <label for="remember_me"> Remember me </label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"> Login </button>
                </div>
                <hr>
                <p> Not registered yet? <a href="{{ route('auth.registerForm') }}"> Create account now </a> </p>
            </form>
        </div>
    </x-slot>
    <x-slot name="isAuthPage"> </x-slot>
</x-layout>
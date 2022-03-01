
<x-layout>
    <x-slot name="title">
        Registration Page
    </x-slot>
    <x-slot name="content">
        <div class="center-item">
            <h1 class="mb-3"> Create an account </h1> 
            <form action="{{ route('auth.register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label for="name">Username</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter username" value="{{ old('name') }}">
                    
                    @error('name')
                        <p class="text-danger mt-1"> {{ $message }} </p>
                    @enderror
                </div>
                {{-- <div class="mb-2">
                    <label for="profile_picture">Upload Profile Picture</label>
                    <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                    
                    @error('profile_picture')
                        <p class="text-danger mt-1"> {{ $message }} </p>
                    @enderror
                </div> --}}
                <div class="mb-2">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" value="{{ old('email') }}">

                    @error('email')
                        <p class="text-danger mt-1"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">

                    @error('password')
                        <p class="text-danger mt-1"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Enter password again">

                    @error('confirm_password')
                        <p class="text-danger mt-1"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"> Create </button>
                </div>
            </form>
            <a href="{{ route('auth.loginForm') }}"> Go back </a>
        </div>
    </x-slot>
    <x-slot name="isAuthPage"> </x-slot>
</x-layout>
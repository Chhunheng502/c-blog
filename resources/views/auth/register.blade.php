
<x-layout>
    <x-slot name="title">
        Registration Page
    </x-slot>
    <x-slot name="content">
        <div class="center-item">
            <h1> Create an account </h1> 
            <form action="{{ route('auth.register') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter username">
                </div>
                <div class="mb-2">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter email">
                </div>
                <div class="mb-2">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
                </div>
                <div class="mb-2">
                    <input type="password" name="confirm password" id="confirm password" class="form-control" placeholder="Enter password again">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"> Create </button>
                </div>
            </form>
        </div>
    </x-slot>
    <x-slot name="isAuthPage"> </x-slot>
</x-layout>
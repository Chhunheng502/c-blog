<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function loginForm(Request $request)
    {
        return view('auth.login', [
            'email_cookie' => $request->cookie('login_email'),
            'password_cookie' => $request->cookie('login_password'),
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember_me = $request->has('remember_me') ? true : false;

        if(Auth::attempt($credentials, $remember_me))
        {
            $request->session()->regenerate();

            session()->flash('successfully logined', 'Welcome back, ' . Auth::user()->name);

            if($remember_me)
            {
                return redirect()->route('posts.index')
                ->withCookie(cookie()->forever('login_email', $request->email))
                ->withCookie(cookie()->forever('login_password', $request->password));
            }

            return redirect()->route('posts.index')
            ->withCookie(Cookie::forget('login_email'))
            ->withCookie(Cookie::forget('login_password'))
            ->withCookie(Cookie::forget(Auth::getRecallerName()));
        }

        return back()->withErrors([
            'password' => 'The provided credentials do not match our records.',
        ]);
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

        $validated_data = $request->validate([
            'name' => ['required', 'max:255', 'unique:users,name'],
            'email' => ['required', 'max:255', 'email', 'unique:users,email'],
            'password' => ['required', 'min:5', 'max:15'],
            'confirm_password' => ['same:password'],
        ]);

        // $profile_path = $request->file('profile_picture')?->store('images', 's3');

        if($validated_data)
        {
            User::create([
                'name' => $request->name,
                // 'profile_picture' => Storage::url($profile_path),
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'slug' => Str::slug($request->name),
            ]);
            
            return view('auth.login');
        }

        return back()->withErrors([$validated_data]);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect()->route('auth.login');
    }
}

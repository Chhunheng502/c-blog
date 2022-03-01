<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Cookie;

class UserController extends Controller
{
    public function loginForm(Request $request)
    {
        return view('auth.login', [
            'email_cookie' => $request->cookie('login_email'),
            'password_cookie' => $request->cookie('login_password')
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $remember_me = $request->has('remember_me') ? true : false;

        if(Auth::attempt($credentials, $remember_me))
        {
            $request->session()->regenerate();

            if($remember_me)
            {
                return redirect()->route('home')
                ->withCookie(cookie()->forever('login_email', $request->email))
                ->withCookie(cookie()->forever('login_password', $request->password));
            }

            return redirect()->route('home')
            ->withCookie(\Cookie::forget('login_email'))
            ->withCookie(\Cookie::forget('login_password'));

            // or return redirect(route('categories.index'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:5', 'max:15', 'same:confirm_password'],
        ]);

        if($validatedData)
        {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            
            return view('auth.login');
        }

        return back()->withErrors([$validatedData]);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect()->route('auth.login');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use Nette\Utils\Random;
use Ramsey\Uuid\Type\Integer;

class UserController extends Controller
{
    public function login() {
        return Inertia::render('auth/login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials, true)) {
      
            Session::regenerate();

            return to_route('home');
        }

        return back()->withErrors(['password' => 'Wrong username or password']);
    }

    public function register() {
        return Inertia::render('auth/register');
    }

    public function store(Request $request) {
        $credentials = $request->validate([
            'username' => ['unique:users,username', 'required', 'min:3'],
            'password' => ['confirmed', 'required', 'min:6']
        ]);

        $credentials['password'] = Hash::make($credentials['password']);

        $user = User::create($credentials);

        Auth::login($user);

        return to_route('home');
    }

    public function logout() {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
        
        return to_route('home');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function show()
    {
        return view('register.form');
    }

    public function store()
    {
        $attributes = request()->validate([
            "name"     => "required|string|max:255",
            "username" => "required|string|min:3|max:255|unique:users,username",
            "email"    => "required|email|unique:users,email",
            "password" => "required|min:6|max:255",
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect()->route('home')->with('success', 'Your account has been created!');
    }
}

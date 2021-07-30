<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function show()
    {
        return view('login.form');
    }

    public function attempt()
    {
        $credentials = request()->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (! auth()->attempt($credentials)) {
            throw ValidationException::withMessages(['email' => 'Credentials do not match.']);
        }

        session()->regenerate();

        return redirect()->route('home')->with('success', 'Welcome back!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->route('home')->with('success', 'Good Bye!');
    }
}

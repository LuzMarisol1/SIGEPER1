<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    public function login() {
        return view('login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'correo' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'correo' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect('/');
    }
}

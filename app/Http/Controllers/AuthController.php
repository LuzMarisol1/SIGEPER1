<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Mail\ConfirmacionRegistro;
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

            $user = Auth::user();

            /* Verificar si el usuario tiene el rol "Alumno"
        if (Auth::user()->hasRole('Alumno')) {
            return redirect()->route('EstudianteER');
        } else {
            return redirect()->intended('/');
        }*/
        //verificar si el usuario tiene matricula 
         if($user->matricula){
                return redirect()->route('informacion.estudiante');
        }
            
        if(Auth::user()->hasRole('Coordinador') || Auth::user()->hasRole('admin')){
            return redirect()->route('InfEstudiantes');
        }else{
            return redirect()->intended('/');
        }
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
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{


/*public function register(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'role' => 'required|in:coordinador,maestro,alumno',
    ]);

    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'role' => $validatedData['role'],
    ]);

    // Enviar correo electrónico de confirmación (implementar según sea necesario)

    return redirect()->route('login')->with('success', 'Cuenta creada exitosamente. Por favor, inicia sesión.');
    }*/

    public function viewTablaEstudiantes(Request $request){
        $usuarios = DB::table('estudiantes_e_r')->get();
        return view('tablaAlumnos', ['usuarios' => $usuarios]);
    }
    public function actualizarD(Request $request){
        $arrayReturn = ["res" =>0, "msg" => ""];

        

    }
    
   
}
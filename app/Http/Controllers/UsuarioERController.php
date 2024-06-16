<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioERRequest;
use App\Http\Requests\UpdateUsuarioERRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\UsuarioER;

class UsuarioERController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function informacionAlumnos(Request $request)
    {
        $usuario = auth()->user();
        
        // Imprimir el objeto $usuario completo
        //dd($usuario);
        
        $matricula = explode('@', $usuario->correo)[0];
        // Imprimir la matrícula extraída
      //  dd($matricula);
        
      $estudianteER = UsuarioER::select(
        'usuario_e_r_s.id',
        'usuario_e_r_s.nombre AS nombreUsuario',
        'usuario_e_r_s.apellido',
        'usuario_e_r_s.matricula',
        'estatuses.nombre AS nombreEstatus',
        'usuario_e_r_s.proyecto',
        'usuario_e_r_s.director',
        'usuario_e_r_s.tipo_inscripcion_id',
        'usuario_e_r_s.modalidad_id',
        'usuario_e_r_s.estatus_id'
    )
    ->leftJoin('estatuses', 'usuario_e_r_s.estatus_id', '=', 'estatuses.id')
    ->where('usuario_e_r_s.matricula', $matricula)
    ->first();
        
        if ($estudianteER) {
            $estudiantes = [$estudianteER];
            // Imprimir el objeto $estudianteER después de aplicar el filtro
           // dd($estudianteER);
        } else {
            $estudiantes = [];
        }
        
        return view('informaciónEstudiante', ['estudiantes' => $estudiantes]);
    }
    
    // ...
}
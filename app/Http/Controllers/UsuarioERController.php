<?php

namespace App\Http\Controllers;

use App\Models\UsuarioER;
use App\Http\Requests\StoreUsuarioERRequest;
use App\Http\Requests\UpdateUsuarioERRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioERController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function informacionAlumnos(Request $request)
    {
        $estudiantes = DB::select("
        SELECT usuario_e_r_s.id, usuario_e_r_s.nombre AS nombreUsuario, usuario_e_r_s.apellido, usuario_e_r_s.matricula, estatuses.nombre AS nombreEstatus, usuario_e_r_s.proyecto, usuario_e_r_s.director, usuario_e_r_s.tipo_inscripcion_id, usuario_e_r_s.modalidad_id, usuario_e_r_s.estatus_id
        FROM usuario_e_r_s
        LEFT JOIN estatuses ON usuario_e_r_s.estatus_id = estatuses.id
    ");
        return view('informaciónEstudiante', ['estudiantes' => $estudiantes]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsuarioERRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsuarioERRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsuarioER  $usuarioER
     * @return \Illuminate\Http\Response
     */
    public function show(UsuarioER $usuarioER)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsuarioER  $usuarioER
     * @return \Illuminate\Http\Response
     */
    public function edit(UsuarioER $usuarioER)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsuarioERRequest  $request
     * @param  \App\Models\UsuarioER  $usuarioER
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsuarioERRequest $request, UsuarioER $usuarioER)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsuarioER  $usuarioER
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsuarioER $usuarioER)
    {
        //
    }
}
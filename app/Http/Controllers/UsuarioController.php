<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\RolUsuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //redirect if not admin
        $user = auth()->user();
        if ($user->rol->nombre !== "admin") {
            return redirect()->route("home");
        }

        $usuarios = Usuario::all();
        return view("tablaUsuarios", compact("usuarios"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //redirect if not admin
        $user = auth()->user();
        if ($user->rol->nombre !== "admin") {
            return redirect()->route("home");
        }
        
        //except admin
        $roles = RolUsuario::where("nombre", "!=", "admin")->get();
        return view("crearCuenta", compact("roles"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsuarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsuarioRequest $request)
    {
        $validated = $request->validated();
        $usuario = new Usuario();
        $usuario->nombre = $validated["nombre"];
        $usuario->correo = $validated["correo"];
        $usuario->password = Hash::make($validated["password"]);
        $usuario->rol_usuario_id = $validated["rol_usuario_id"];
        $usuario->save();
        // return redirect()->back()->with("success", "Usuario creado exitosamente");
        return redirect()->route("usuarios")->with("success", "Usuario creado exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsuarioRequest  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}

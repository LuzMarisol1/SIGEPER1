<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComentarioRequest;
use App\Http\Requests\UpdateComentarioRequest;
use App\Mail\NuevoComentario;
use App\Models\Comentario;
use App\Models\Documentos;
use App\Models\Usuario;
use Illuminate\Support\Facades\Mail;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id_documento)
    {
        $documento = Documentos::find($id_documento);
        if (!$documento) {
            return redirect()->route('home')->with('error', 'No se encontró el documento');
        }
        
        $comentarios = $documento->comentarios->sortByDesc('created_at');
        $proyecto = $documento->usuarioER;
        return view('comentariosDocumento', compact('comentarios', 'documento', 'proyecto'));
        
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
     * @param  \App\Http\Requests\StoreComentarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComentarioRequest $request)
    {
        $data = $request->validated();
        if (auth()->id() !== intval($data['usuario_id'])) {
            return redirect()->back()->with('error', 'No tienes permiso para agregar un comentario con un usuario diferente');
        }


        $comentario = Comentario::create($data);
        $id_documento = $data['documento_id'];

        if ($id_documento !== $request->input('documento_id')) {
            return redirect()->back()->with('error', 'El ID del documento no coincide con el documento seleccionado');
        }

        $id_usuario = $data['usuario_id'];
        $documento = Documentos::find($id_documento);

        

        $proyecto = $documento->usuarioER;
        $usuario_proyecto = Usuario::whereRaw('? like concat("%", matricula, "%")', [$proyecto->matricula])->first();
        if ($usuario_proyecto && $usuario_proyecto->id != $id_usuario) {
            Mail::to($usuario_proyecto->correo)->send(new NuevoComentario($comentario));
        }
        $correo_usuario_proyecto = $usuario_proyecto ? $usuario_proyecto->correo : '';
        $comentarios_documento = $documento->comentarios;
        $usuarios_comentarios = $comentarios_documento->map(function ($comentario) use ($correo_usuario_proyecto) {
            if ($comentario->usuario->correo != $correo_usuario_proyecto)
                return $comentario->usuario;
        })->unique('correo');
        foreach ($usuarios_comentarios as $usuario) {
            if ($usuario && $usuario->id != $id_usuario)
                Mail::to($usuario->correo)->send(new NuevoComentario($comentario));
        }
        return redirect()->route('comentariosDocumento', $id_documento)->with('success', 'Comentario agregado');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateComentarioRequest  $request
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComentarioRequest $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}

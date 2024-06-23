<?php

namespace App\Http\Controllers;

use App\Models\Documentos;
use App\Http\Requests\StoreDocumentosRequest;
use App\Http\Requests\UpdateDocumentosRequest;
use App\Models\Documento;
use App\Models\UsuarioER;
use Illuminate\Http\Request;

class DocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function projectDocuments(int $id_proyecto)
    {

        $proyecto = UsuarioER::find($id_proyecto);
        if (!$proyecto) {
            return redirect()->route('home')->with('error', 'No se encontró el proyecto');
        }
        $documentos = $proyecto->documentos;
        $tipos_documento = Documentos::$tipos_documento_modalidad;
        return view('documentosProyecto', compact('documentos', 'proyecto', 'tipos_documento'));
    }

    public function updateEstatus(Request $request) {
        $data = $request->validate(
            [
                'id' => 'required|integer',
                'estatus' => 'required|string'
            ]
        );
        $documento = Documentos::find($data['id']);
        if (!$documento) {
            return redirect()->route('home')->with('error', 'No se encontró el documento');
        }
        $documento->estatus = $data['estatus'];
        $documento->save();
        return redirect()->route('documentos.proyecto', $documento->usuario_e_r_id)->with('success', 'Estatus actualizado');
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
     * @param  \App\Http\Requests\StoreDocumentosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Documentos  $documentos
     * @return \Illuminate\Http\Response
     */
    public function show(Documentos $documentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Documentos  $documentos
     * @return \Illuminate\Http\Response
     */
    public function edit(Documentos $documentos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentosRequest  $request
     * @param  \App\Models\Documentos  $documentos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentosRequest $request, Documentos $documentos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Documentos  $documentos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documentos $documentos)
    {
        //
    }
}

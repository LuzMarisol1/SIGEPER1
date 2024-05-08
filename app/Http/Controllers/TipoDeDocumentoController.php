<?php

namespace App\Http\Controllers;

use App\Models\TipoDeDocumento;
use App\Http\Requests\StoreTipoDeDocumentoRequest;
use App\Http\Requests\UpdateTipoDeDocumentoRequest;

class TipoDeDocumentoController extends Controller
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
     * @param  \App\Http\Requests\StoreTipoDeDocumentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoDeDocumentoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoDeDocumento  $tipoDeDocumento
     * @return \Illuminate\Http\Response
     */
    public function show(TipoDeDocumento $tipoDeDocumento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoDeDocumento  $tipoDeDocumento
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoDeDocumento $tipoDeDocumento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoDeDocumentoRequest  $request
     * @param  \App\Models\TipoDeDocumento  $tipoDeDocumento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoDeDocumentoRequest $request, TipoDeDocumento $tipoDeDocumento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoDeDocumento  $tipoDeDocumento
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoDeDocumento $tipoDeDocumento)
    {
        //
    }
}

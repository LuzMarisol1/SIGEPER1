<?php

namespace App\Http\Controllers;

use App\Models\Documentos;
use App\Http\Requests\StoreDocumentosRequest;
use App\Http\Requests\UpdateDocumentosRequest;

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

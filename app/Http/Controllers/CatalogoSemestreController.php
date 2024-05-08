<?php

namespace App\Http\Controllers;

use App\Models\CatalogoSemestre;
use App\Http\Requests\StoreCatalogoSemestreRequest;
use App\Http\Requests\UpdateCatalogoSemestreRequest;

class CatalogoSemestreController extends Controller
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
     * @param  \App\Http\Requests\StoreCatalogoSemestreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCatalogoSemestreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CatalogoSemestre  $catalogoSemestre
     * @return \Illuminate\Http\Response
     */
    public function show(CatalogoSemestre $catalogoSemestre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CatalogoSemestre  $catalogoSemestre
     * @return \Illuminate\Http\Response
     */
    public function edit(CatalogoSemestre $catalogoSemestre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCatalogoSemestreRequest  $request
     * @param  \App\Models\CatalogoSemestre  $catalogoSemestre
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCatalogoSemestreRequest $request, CatalogoSemestre $catalogoSemestre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CatalogoSemestre  $catalogoSemestre
     * @return \Illuminate\Http\Response
     */
    public function destroy(CatalogoSemestre $catalogoSemestre)
    {
        //
    }
}

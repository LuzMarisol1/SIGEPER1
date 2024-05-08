<?php

namespace App\Http\Controllers;

use App\Models\Estatus;
use App\Http\Requests\StoreEstatusRequest;
use App\Http\Requests\UpdateEstatusRequest;

class EstatusController extends Controller
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
     * @param  \App\Http\Requests\StoreEstatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estatus  $estatus
     * @return \Illuminate\Http\Response
     */
    public function show(Estatus $estatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estatus  $estatus
     * @return \Illuminate\Http\Response
     */
    public function edit(Estatus $estatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstatusRequest  $request
     * @param  \App\Models\Estatus  $estatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstatusRequest $request, Estatus $estatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estatus  $estatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estatus $estatus)
    {
        //
    }
}

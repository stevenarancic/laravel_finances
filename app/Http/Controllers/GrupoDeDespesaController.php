<?php

namespace App\Http\Controllers;

use App\Models\GrupoDeDespesa;
use Illuminate\Http\Request;

class GrupoDeDespesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('grupo_de_despesas.index', ['gruposDeDespesa' => GrupoDeDespesa::lazy()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grupo_de_despesas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        GrupoDeDespesa::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GrupoDeDespesa  $grupoDeDespesa
     * @return \Illuminate\Http\Response
     */
    public function show(GrupoDeDespesa $grupoDeDespesa)
    {
        return view('grupo_de_despesas.show', ['grupoDeDespesa' => $grupoDeDespesa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GrupoDeDespesa  $grupoDeDespesa
     * @return \Illuminate\Http\Response
     */
    public function edit(GrupoDeDespesa $grupoDeDespesa)
    {
        return view('grupo_de_despesas.edit', ['grupoDeDespesa' => $grupoDeDespesa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GrupoDeDespesa  $grupoDeDespesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GrupoDeDespesa $grupoDeDespesa)
    {
        $grupoDeDespesa->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GrupoDeDespesa  $grupoDeDespesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(GrupoDeDespesa $grupoDeDespesa)
    {
        $grupoDeDespesa->delete();
    }
}

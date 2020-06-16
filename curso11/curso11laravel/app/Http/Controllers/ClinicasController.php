<?php

namespace App\Http\Controllers;

use App\Clinicas;
use Illuminate\Http\Request;

class ClinicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Clinicas::all();

        return $model;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model              = new Clinicas();
        $model->nombre      = $request->nombre;
        $model->descripcion = $request->descripcion;
        $model->contenido   = $request->contenido;
        $model->save();

        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clinicas  $models
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $model = Clinicas::findOrFail($id);

        return $model;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clinicas  $models
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $model              = Clinicas::findOrFail($request->id);
        $model->nombre      = $request->nombre;
        $model->descripcion = $request->descripcion;
        $model->contenido   = $request->contenido;
        $model->save();

        return $model;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clinicas  $models
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $model = Clinicas::findOrFail($id);
        $model->delete();

        return $model;
    }
}

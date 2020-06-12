<?php

namespace App\Http\Controllers;

use App\Clinicas;
use App\Http\Requests\CreateClinicaRequest;
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
        $clinicas = Clinicas::all();
        return view('clinicas.index', compact('clinicas', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clinicas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClinicaRequest $request)
    {
        $oStore = new Clinicas([
            'nombre' => $request->get('nombre'),
            'direccion' => $request->get('direccion'),
            'telefono' => $request->get('telefono'),
            'fax' => $request->get('fax'),
            'email' => $request->get('email'),
        ]);
        $oStore->save();
        return redirect('/clinicas')->with(
            'success',
            'La clínica se guardó correctamente'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clinicas  $clinicas
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        echo $request->all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clinicas  $clinicas
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinicas $clinicas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clinicas  $clinicas
     * @return \Illuminate\Http\Response
     */
    public function update(CreateClinicaRequest $request, Clinicas $clinicas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clinicas  $clinicas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinicas $clinicas)
    {
        //
    }
}

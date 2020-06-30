<?php

namespace App\Http\Controllers;

use App\Clinica;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClinicaRequest;
use App\Http\Requests\UpdateClinicaRequest;

class ClinicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clinicas = Clinica::orderBy('id', 'DESC');

        // Paginate
        $paginate = $request->get('paginate') ?? Clinica::PAGINATE_DEFAULT;

        // Resultados
        $clinicas = $clinicas->paginate($paginate);

        return view('clinicas.index', compact('clinicas', 'paginate'));
        // clinicas/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clinicas.create');
        // clinicas/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClinicaRequest $request)
    {
        $clinica = new Clinica($request->all());
        $clinica->save();
        return redirect(route('clinicas.index'))->with([
            'message' => 'La clínica se agregó correctamente',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clinica  $clinica
     * @return \Illuminate\Http\Response
     */
    public function show(Clinica $clinica)
    {
        $clinica = Clinica::findOrFail($clinica->id);
        return view('clinicas.show', compact('clinica'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clinica  $clinica
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinica $clinica)
    {
        $clinica = Clinica::findOrFail($clinica->id);
        return view('clinicas.edit', compact('clinica'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clinica  $clinica
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClinicaRequest $request, Clinica $clinica)
    {
        $clinica = Clinica::findOrFail($clinica->id);
        $clinica->update($request->all());
        return redirect(route('clinicas.index'))->with([
            'message' => 'La clínica se modificó correctamente',
            'type' => 'primary',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clinica  $clinica
     * @return \Illuminate\Http\Response
     */
    public function destroyform(Clinica $clinica)
    {
        $clinica = Clinica::findOrFail($clinica->id);
        return view('clinicas.destroyform', compact('clinica'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clinica  $clinica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinica $clinica)
    {
        $clinica = Clinica::findOrFail($clinica->id);
        $clinica->delete();
        return redirect(route('clinicas.index'))->with([
            'message' => 'La clínica se eliminó correctamente',
            'type' => 'danger',
        ]);
    }
}

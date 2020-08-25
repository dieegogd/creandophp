<?php

namespace App\Http\Controllers;

use App\Localidad;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLocalidadRequest;
use App\Http\Requests\UpdateLocalidadRequest;

class LocalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $localidades = Localidad::orderBy('id', 'DESC');

        // Search
        $search = $request->get('search');
        $option = $request->get('option');

        $localidades->filterSearchAll($search);

        // Paginate
        $paginate = $request->get('paginate') ?? Localidad::PAGINATE_DEFAULT;

        $localidades = $localidades->paginate($paginate);

        return view('localidades.index', compact('localidades', 'search', 'paginate', 'option'));
        // localidades/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('localidades.create');
        // localidades/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelocalidadRequest $request)
    {
        $localidades = new Localidad($request->validated());
        $localidades->save();
        return redirect(route('localidades.index'))->with([
            'message' => 'La localidad se agregó correctamente',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Localidad  $localidad
     * @return \Illuminate\Http\Response
     */
    public function show(Localidad $localidad)
    {
        return view('localidades.show', compact('localidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Localidad  $localidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Localidad $localidad)
    {
        return view('localidades.edit', compact('localidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Localidad  $localidad
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocalidadRequest $request, Localidad $localidad)
    {
        $localidad->update($request->validated());
        return redirect(route('localidades.index'))->with([
            'message' => 'La localidad se modificó correctamente',
            'type' => 'primary',
        ]);
    }


    public function destroyform(Localidad $localidad)
    {
        return view('localidades.destroyform', compact('localidad'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Localidad  $localidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Localidad $localidad)
    {
        $localidad->delete();
        return redirect(route('localidades.index'))->with([
            'message' => 'La localidad se eliminó correctamente',
            'type' => 'danger',
        ]);
    }
}

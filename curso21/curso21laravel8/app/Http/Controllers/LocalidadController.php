<?php

namespace App\Http\Controllers;

use App\Models\Localidad;
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

        $localidades->filterSearchAll($search, Localidad::FILTERED);

        // Paginate
        $paginate = $request->get('paginate') ?? Localidad::PAGINATE_DEFAULT;

        $localidades = $localidades->paginate($paginate);

        return view('localidads.index', compact('localidades', 'search', 'paginate', 'option'));
        // localidades/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('localidads.create');
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
        return redirect(route('localidads.index'))->with([
            'message' => 'La localidad se agregó correctamente',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Localidad  $localidad
     * @return \Illuminate\Http\Response
     */
    public function show(Localidad $localidad)
    {
        return view('localidads.show', compact('localidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Localidad  $localidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Localidad $localidad)
    {
        return view('localidads.edit', compact('localidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Localidad  $localidad
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocalidadRequest $request, Localidad $localidad)
    {
        $localidad->update($request->validated());
        return redirect(route('localidads.index'))->with([
            'message' => 'La localidad se modificó correctamente',
            'type' => 'primary',
        ]);
    }


    public function destroyform(Localidad $localidad)
    {
        return view('localidads.destroyform', compact('localidad'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Localidad  $localidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Localidad $localidad)
    {
        $localidad->delete();
        return redirect(route('localidads.index'))->with([
            'message' => 'La localidad se eliminó correctamente',
            'type' => 'danger',
        ]);
    }
}

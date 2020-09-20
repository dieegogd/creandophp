<?php

namespace App\Http\Controllers;

use App\Articuloxsucursale;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticuloxsucursaleRequest;
use App\Http\Requests\UpdateArticuloxsucursaleRequest;

class ArticuloxsucursaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articuloxsucursales = Articuloxsucursale::orderBy('id', 'DESC');

        // Search
        $search = $request->get('search');
        $option = $request->get('option');

        $articuloxsucursales->filterSearchAll($search, Articuloxsucursale::FILTERED);




        // Paginate
        $paginate = $request->get('paginate') ?? Articuloxsucursale::PAGINATE_DEFAULT;

        $articuloxsucursales = $articuloxsucursales->paginate($paginate);

        return view('articuloxsucursales.index', compact('articuloxsucursales', 'search', 'paginate', 'option'));
        // articuloxsucursales/index.blade.php
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articuloxsucursales.create');
        // articuloxsucursales/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticuloxsucursaleRequest $request)
    {
        $articuloxsucursale = new Articuloxsucursale($request->validated());
        $articuloxsucursale->save();
        return redirect(route('articuloxsucursales.index'))->with([
            'message' => 'El artículo se agregó correctamente',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articuloxsucursale  $articuloxsucursale
     * @return \Illuminate\Http\Response
     */
    public function show(Articuloxsucursale $articuloxsucursale)
    {
        return view('articuloxsucursales.show', compact('articuloxsucursale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articuloxsucursale  $articuloxsucursale
     * @return \Illuminate\Http\Response
     */
    public function edit(Articuloxsucursale $articuloxsucursale)
    {
        return view('articuloxsucursales.edit', compact('articuloxsucursale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articuloxsucursale  $articuloxsucursale
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticuloxsucursaleRequest $request, Articuloxsucursale $articuloxsucursale)
    {
        $articuloxsucursale->update($request->validated());
        return redirect(route('articuloxsucursales.index'))->with([
            'message' => 'El artículo se modificó correctamente',
            'type' => 'primary',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\articuloxsucursale  $articuloxsucursale
     * @return \Illuminate\Http\Response
     */
    public function destroyform(Articuloxsucursale $articuloxsucursale)
    {
        return view('articuloxsucursales.destroyform', compact('articuloxsucursale'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articuloxsucursale  $articuloxsucursale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articuloxsucursale $articuloxsucursale)
    {
        $articuloxsucursale->delete();
        return redirect(route('articuloxsucursales.index'))->with([
            'message' => 'El artículo se eliminó correctamente',
            'type' => 'danger',
        ]);
    }
}

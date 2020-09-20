<?php

namespace App\Http\Controllers;

use App\Ventadetalle;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVentadetalleRequest;
use App\Http\Requests\UpdateVentadetalleRequest;

class VentadetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ventadetalles = Ventadetalle::orderBy('id', 'DESC');

        // Search
        $search = $request->get('search');
        $option = $request->get('option');

        $ventadetalles->filterSearchAll($search, Ventadetalle::FILTERED);




        // Paginate
        $paginate = $request->get('paginate') ?? Ventadetalle::PAGINATE_DEFAULT;

        $ventadetalles = $ventadetalles->paginate($paginate);

        return view('ventadetalles.index', compact('ventadetalles', 'search', 'paginate', 'option'));
        // ventadetalles/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ventadetalles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVentadetalleRequest $request)
    {
        $ventadetalle = new Ventadetalle($request->validated());
        $ventadetalle->save();
        return redirect(route('ventadetalles.index'))->with([
            'message' => 'El detalle de venta se agregó correctamente',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ventadetalle  $ventadetalle
     * @return \Illuminate\Http\Response
     */
    public function show(Ventadetalle $ventadetalle)
    {
        return view('ventadetalles.show', compact('ventadetalle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ventadetalle  $ventadetalle
     * @return \Illuminate\Http\Response
     */
    public function edit(Ventadetalle $ventadetalle)
    {
        return view('ventadetalles.edit', compact('ventadetalle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ventadetalle  $ventadetalle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVentadetalleRequest $request, Ventadetalle $ventadetalle)
    {
        $ventadetalle->update($request->validated());
        return redirect(route('ventadetalles.index'))->with([
            'message' => 'El detalle de venta se modificó correctamente',
            'type' => 'primary',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ventadetalle  $ventadetalle
     * @return \Illuminate\Http\Response
     */
    public function destroyform(Ventadetalle $ventadetalle)
    {
        return view('ventadetalles.destroyform', compact('ventadetalle'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ventadetalle  $ventadetalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ventadetalle $ventadetalle)
    {
        $ventadetalle->delete();
        return redirect(route('ventadetalles.index'))->with([
            'message' => 'El detalle de venta se eliminó correctamente',
            'type' => 'danger',
        ]);
    }
}

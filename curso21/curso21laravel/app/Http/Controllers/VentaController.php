<?php

namespace App\Http\Controllers;

use App\Venta;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVentaRequest;
use App\Http\Requests\UpdateVentaRequest;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ventas = Venta::orderBy('id', 'DESC');

        // Search
        $search = $request->get('search');
        $option = $request->get('option');

        $ventas->filterSearchAll($search, Venta::FILTERED);




        // Paginate
        $paginate = $request->get('paginate') ?? Venta::PAGINATE_DEFAULT;

        $ventas = $ventas->paginate($paginate);

        return view('ventas.index', compact('ventas', 'search', 'paginate', 'option'));
        // ventas/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ventas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVentaRequest $request)
    {
        $venta = new Venta($request->validated());
        $venta->save();
        return redirect(route('ventas.index'))->with([
            'message' => 'La venta se agregó correctamente',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        return view('ventas.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        return view('ventas.edit', compact('venta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVentaRequest $request, Venta $venta)
    {
        $venta->update($request->validated());
        return redirect(route('ventas.index'))->with([
            'message' => 'La venta se modificó correctamente',
            'type' => 'primary',
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroyform(Venta $venta)
    {
        return view('ventas.destroyform', compact('venta'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect(route('ventas.index'))->with([
            'message' => 'La venta se eliminó correctamente',
            'type' => 'danger',
        ]);
    }
}

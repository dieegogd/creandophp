<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticuloRequest;
use App\Http\Requests\UpdateArticuloRequest;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articulos = Articulo::orderBy('id', 'DESC');

        // Search
        $search = $request->get('search');
        $option = $request->get('option');

        $articulos->filterSearchAll($search, Articulo::FILTERED);

        // Paginate
        $paginate = $request->get('paginate') ?? Articulo::PAGINATE_DEFAULT;

        $articulos = $articulos->paginate($paginate);

        return view('articulos.index', compact('articulos', 'search', 'paginate', 'option'));
        // articulos/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulos.create');
        // articulos/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticuloRequest $request)
    {
        $articulo = new Articulo($request->validated());
        $articulo->save();
        return redirect(route('articulos.index'))->with([
            'message' => 'La artículo se agregó correctamente',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        return view('articulos.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        return view('articulos.edit', compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticuloRequest $request, Articulo $articulo)
    {
        $articulo->update($request->validated());
        return redirect(route('articulos.index'))->with([
            'message' => 'La artículo se modificó correctamente',
            'type' => 'primary',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroyform(Articulo $articulo)
    {
        return view('articulos.destroyform', compact('articulo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        $articulo->delete();
        return redirect(route('articulos.index'))->with([
            'message' => 'La artículo se eliminó correctamente',
            'type' => 'danger',
        ]);
    }
}

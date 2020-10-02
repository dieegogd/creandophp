<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Http\Requests\StoreArticuloRequest;
use App\Http\Requests\UpdateArticuloRequest;
use App\Localidad;
use App\Sucursal;
use Illuminate\Http\Request;

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
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        return view('articulos.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulo  $articulo
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
     * @param  \App\Articulo  $articulo
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
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroyform(Articulo $articulo)
    {
        return view('articulos.destroyform', compact('articulo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $articulo
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

    /**
     * Autocomplete the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocompletar(Request $request, Sucursal $sucursal, Localidad $localidad)
    {
        $term = explode(" ", $request->get('term'));
        $query = Articulo::select([
            'articulos.id',
            'articulos.id as value',
            'articulos.nombre as label',
            'listaprecios.precio'
        ]);
        $query->join('articuloxsucursales', 'articulos.id', '=', 'articuloxsucursales.articulo_id');
        $query->where('articuloxsucursales.sucursal_id', '=', $sucursal->id);
        $query->join('listaprecios', 'articulos.id', '=', 'listaprecios.articulo_id');
        $query->where('listaprecios.localidad_id', '=', $localidad->id);
        foreach ($term as $t) {
            $query->where('articulos.nombre', 'LIKE', "%{$t}%");
        }
        $query->groupBy(['articulos.id', 'listaprecios.precio']);
        $query = $query->get();
        $query = $query->toJson();
        return $query;
    }
}

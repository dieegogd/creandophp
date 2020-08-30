<?php

namespace App\Http\Controllers;

use App\Listaprecio;
use Illuminate\Http\Request;
use App\Http\Requests\StoreListaprecioRequest;
use App\Http\Requests\UpdateListaprecioRequest;

class ListaprecioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listaprecios = Listaprecio::orderBy('id', 'DESC');

        // Search
        $search = $request->get('search');
        $option = $request->get('option');

        $listaprecios->filterSearchAll($search, Listaprecio::FILTERED);

        // Paginate
        $paginate = $request->get('paginate') ?? Listaprecio::PAGINATE_DEFAULT;

        $listaprecios = $listaprecios->paginate($paginate);

        return view('listaprecios.index', compact('listaprecios', 'search', 'paginate', 'option'));
        // listaprecios/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listaprecios.create');
        // listaprecios/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreListaprecioRequest $request)
    {
        $listaprecio = new Listaprecio($request->validated());
        $listaprecio->save();
        return redirect(route('listaprecios.index'))->with([
            'message' => 'La lista de precios se agregó correctamente',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Listaprecio  $listaprecio
     * @return \Illuminate\Http\Response
     */
    public function show(Listaprecio $listaprecio)
    {
        return view('listaprecios.show', compact('listaprecio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Listaprecio  $listaprecio
     * @return \Illuminate\Http\Response
     */
    public function edit(Listaprecio $listaprecio)
    {
        return view('listaprecios.edit', compact('listaprecio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Listaprecio  $listaprecio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateListaprecioRequest $request, Listaprecio $listaprecio)
    {
        $listaprecio->update($request->validated());
        return redirect(route('listaprecios.index'))->with([
            'message' => 'La lista de precios se modificó correctamente',
            'type' => 'primary',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Listaprecio  $listaprecio
     * @return \Illuminate\Http\Response
     */
    public function destroyform(Listaprecio $listaprecio)
    {
        return view('listaprecios.destroyform', compact('listaprecio'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Listaprecio  $listaprecio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listaprecio $listaprecio)
    {
        $listaprecio->delete();
        return redirect(route('listaprecios.index'))->with([
            'message' => 'La lista de precios se eliminó correctamente',
            'type' => 'danger',
        ]);
    }
}

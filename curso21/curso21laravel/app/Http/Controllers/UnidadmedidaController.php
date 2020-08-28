<?php

namespace App\Http\Controllers;

use App\Unidadmedida;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUnidadmedidaRequest;
use App\Http\Requests\UpdateUnidadmedidaRequest;

class UnidadmedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $unidadmedidas = Unidadmedida::orderBy('id', 'DESC');

        // Search
        $search = $request->get('search');
        $option = $request->get('option');

        $unidadmedidas->filterSearchAll($search, Unidadmedida::FILTERED);

        // Paginate
        $paginate = $request->get('paginate') ?? Unidadmedida::PAGINATE_DEFAULT;

        $unidadmedidas = $unidadmedidas->paginate($paginate);

        return view('unidadmedidas.index', compact('unidadmedidas', 'search', 'paginate', 'option'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unidadmedidas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUnidadmedidaRequest $request)
    {
        $unidadmedida = new Unidadmedida($request->validated());
        $unidadmedida->save();
        return redirect(route('unidadmedidas.index'))->with([
            'message' => 'La unidad de medida se agregó correctamente',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unidadmedida  $unidadmedida
     * @return \Illuminate\Http\Response
     */
    public function show(Unidadmedida $unidadmedida)
    {
        return view('unidadmedidas.show', compact('unidadmedida'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unidadmedida  $unidadmedida
     * @return \Illuminate\Http\Response
     */
    public function edit(Unidadmedida $unidadmedida)
    {
        return view('unidadmedidas.edit', compact('unidadmedida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unidadmedida  $unidadmedida
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUnidadmedidaRequest $request, Unidadmedida $unidadmedida)
    {
        $unidadmedida->update($request->validated());
        return redirect(route('unidadmedidas.index'))->with([
            'message' => 'La unidad de medida se modificó correctamente',
            'type' => 'primary',
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */

    public function destroyform(Unidadmedida $unidadmedida)
    {
        return view('unidadmedidas.destroyform', compact('unidadmedida'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unidadmedida  $unidadmedida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unidadmedida $unidadmedida)
    {
        $unidadmedida->delete();
        return redirect(route('unidadmedidas.index'))->with([
            'message' => 'La unidad de medida se eliminó correctamente',
            'type' => 'danger',
        ]);
    }
}

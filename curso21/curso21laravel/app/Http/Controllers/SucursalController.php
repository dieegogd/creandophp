<?php

namespace App\Http\Controllers;

use App\Sucursal;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSucursalRequest;
use App\Http\Requests\UpdateSucursalRequest;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sucursales = Sucursal::orderBy('id', 'DESC');

        // Search
        $search = $request->get('search');
        $option = $request->get('option');

        $sucursales->filterSearchAll($search, Sucursal::FILTERED);

        // Paginate
        $paginate = $request->get('paginate') ?? Sucursal::PAGINATE_DEFAULT;

        $sucursales = $sucursales->paginate($paginate);

        return view('sucursals.index', compact('sucursales', 'search', 'paginate', 'option'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sucursals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSucursalRequest $request)
    {
        $sucursal = new Sucursal($request->validated());
        $sucursal->save();
        return redirect(route('sucursals.index'))->with([
            'message' => 'La sucursal se agregó correctamente',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function show(Sucursal $sucursal)
    {
        return view('sucursals.show', compact('sucursal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function edit(Sucursal $sucursal)
    {
        return view('sucursals.edit', compact('sucursal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSucursalRequest $request, Sucursal $sucursal)
    {
        $sucursal->update($request->validated());
        return redirect(route('sucursals.index'))->with([
            'message' => 'La sucursal se modificó correctamente',
            'type' => 'primary',
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function destroyform(Sucursal $sucursal)
    {
        return view('sucursals.destroyform', compact('sucursal'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sucursal $sucursal)
    {
        $sucursal->delete();
        return redirect(route('sucursals.index'))->with([
            'message' => 'La sucursal se eliminó correctamente',
            'type' => 'danger',
        ]);
    }
}

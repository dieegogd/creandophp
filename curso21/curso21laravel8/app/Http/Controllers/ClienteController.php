<?php

namespace App\Http\Controllers;

Models\use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente::orderBy('id', 'DESC');

        // Search
        $search = $request->get('search');
        $option = $request->get('option');

        $clientes->filterSearchAll($search, Cliente::FILTERED);

        // Paginate
        $paginate = $request->get('paginate') ?? Cliente::PAGINATE_DEFAULT;

        $clientes = $clientes->paginate($paginate);

        return view('clientes.index', compact('clientes', 'search', 'paginate', 'option'));
        // clientes/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
        // clientes/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClienteRequest $request)
    {
        $cliente = new Cliente($request->validated());
        $cliente->save();
        return redirect(route('clientes.index'))->with([
            'message' => 'El cliente se agregó correctamente',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->validated());
        return redirect(route('clientes.index'))->with([
            'message' => 'El cliente se modificó correctamente',
            'type' => 'primary',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroyform(Cliente $cliente)
    {
        return view('clientes.destroyform', compact('cliente'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect(route('clientes.index'))->with([
            'message' => 'El cliente se eliminó correctamente',
            'type' => 'danger',
        ]);
    }
}

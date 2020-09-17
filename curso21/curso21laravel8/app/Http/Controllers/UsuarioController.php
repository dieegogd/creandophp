<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuarios = User::orderBy('id', 'DESC');

        // Search
        $search = $request->get('search');
        $option = $request->get('option');

        $usuarios->filterSearchAll($search, User::FILTERED);

        // Paginate
        $paginate = $request->get('paginate') ?? User::PAGINATE_DEFAULT;

        $usuarios = $usuarios->paginate($paginate);

        return view('usuarios.index', compact('usuarios', 'search', 'paginate', 'option'));
        // usuarios/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
        // usuarios/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsuarioRequest $request)
    {
        $usuario = new User($request->validated());
        $usuario->save();
        return redirect(route('usuarios.index'))->with([
            'message' => 'El usuario se agregó correctamente',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsuarioRequest $request, User $usuario)
    {
        $usuario->update($request->validated());
        return redirect(route('usuarios.index'))->with([
            'message' => 'El usuario se modificó correctamente',
            'type' => 'primary',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroyform(User $usuario)
    {
        return view('usuarios.destroyform', compact('usuario'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect(route('usuarios.index'))->with([
            'message' => 'El usuario se eliminó correctamente',
            'type' => 'danger',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Rol;
use App\Http\Requests\StoreRolRequest;
use App\Http\Requests\UpdateRolRequest;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Rol::orderBy('id', 'DESC');

        // Search
        $search = $request->get('search');
        $option = $request->get('option');

        $roles->filterSearchAll($search);

        // Paginate
        $paginate = $request->get('paginate') ?? Rol::PAGINATE_DEFAULT;

        // Resultados
        switch ($option) {
            case 'recycle':
                if (!\Auth::user()->hasPermissionTo('roles_recycle')) {
                    abort(403, "User does not have the right permissions.");
                }
                \Auth::user()->can('roles_recycle');
                $roles = $roles->onlyTrashed()->paginate($paginate);
                break;
            default:
                $roles = $roles->paginate($paginate);
                break;
        }

        return view('roles.index', compact('roles', 'search', 'paginate', 'option'));
        // roles/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
        // roles/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolRequest $request)
    {
        $rol = new Rol($request->validated());
        $rol->save();
        return redirect(route('roles.index'))->with([
            'message' => 'El rol se agregó correctamente',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $rol)
    {
        return view('roles.show', compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit(Rol $rol)
    {
        return view('roles.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolRequest $request, Rol $rol)
    {
        $rol->update($request->validated());
        return redirect(route('roles.index'))->with([
            'message' => 'El rol se modificó correctamente',
            'type' => 'primary',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroyform(Rol $rol)
    {
        return view('roles.destroyform', compact('rol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $rol)
    {
        $rol->delete();
        return redirect(route('roles.index'))->with([
            'message' => 'El rol se eliminó correctamente',
            'type' => 'danger',
        ]);
    }

    public function restore($id)
    {
        $rol = Rol::onlyTrashed()->findOrFail($id);
        $rol->restore();
        return redirect(route('roles.index', ['option' => 'recycle']))->with([
            'message' => 'El rol se restauró correctamente',
            'type' => 'success',
        ]);
    }

    public function forcedelete($id)
    {
        $rol = Rol::onlyTrashed()->findOrFail($id);
        $rol->forcedelete();
        return redirect(route('roles.index', ['option' => 'recycle']))->with([
            'message' => 'El rol se eliminó correctamente',
            'type' => 'danger',
        ]);
    }
}

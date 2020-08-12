@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('roles.index') }}">Lista de Roles</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Mostrar Rol
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <h3 class="card-header bg-secondary text-white">
            <i class="fa fa-group"></i>
            Ver de Rol
        </h3>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input disabled type="text" class="form-control" name="name" value="{{ old('name', $rol->name) }}" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="guard_name">Ambiente:</label>
                                <input disabled type="text" class="form-control" name="guard_name" value="{{ old('guard_name', $rol->guard_name) }}" placeholder="Ambiente">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="created_at">Creado:</label>
                                <input disabled type="text" class="form-control" name="created_at" value="{{ $rol->created_at->format('d/m/Y H:i:s') }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="updated_at">Modificado:</label>
                                <input disabled type="text" class="form-control" name="updated_at" value="{{ isset($rol->updated_at) ? $rol->updated_at->format('d/m/Y H:i:s') : '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Permisos:</label>
                                @foreach($rol->permisos as $permiso)
                                    <div>{{ $permiso->guard_name }} &raquo; {{ __('permissions.'.$permiso->name) }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('roles.index') }}" class="btn btn-sm btn-secondary">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                        Agregar Roles
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <h3 class="card-header bg-success text-white">
            <i class="fa fa-group"></i>
            Agregar Rol
        </h3>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('roles.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Nombre:</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="guard_name">Ambiente:</label>
                                    {{ Form::select('guard_name', ['web' => 'web', 'api' => 'api'], old('guard_name'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Permisos:</label>
                                    @foreach (\App\Permiso::all() as $permiso)
                                        <div>
                                            <input id="permission{{ $permiso->id }}" name="permissions[]" value="{{ $permiso->id }}" type="checkbox">
                                            <label for="permission{{ $permiso->id }}">
                                                {{ $permiso->guard_name }} |
                                                {{ __('permissions.'.$permiso->name) }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-success">Agregar</button>
                                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-link">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                        <a href="{{ route('clinicas.index') }}">Lista de Clínicas</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Agregar Clínicas
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <h3 class="card-header bg-success text-white">
            <i class="fa fa-group"></i>
            Agregar Clínica
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
                    <form method="post" action="{{ route('clinicas.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="direccion">Dirección:</label>
                                    <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" placeholder="Dirección">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="telefono">Teléfono:</label>
                                    <input type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" placeholder="Teléfono">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fax">Fax:</label>
                                    <input type="text" class="form-control" name="fax" value="{{ old('fax') }}" placeholder="Fax">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">@</div>
                                        </div>
                                        <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cuil">Usuario:</label>
                                    {{ Form::select('user_id', App\User::orderBy('name')->pluck('name', 'id'), old('user_id'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cuil">Cuil:</label>
                                    <input type="text" class="form-control" name="cuil" value="{{ old('cuil') }}" placeholder="Cuil">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-sm btn-success">Agregar</button>
                                <a href="{{ route('clinicas.index') }}" class="btn btn-sm btn-link">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

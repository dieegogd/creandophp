@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('unidadmedidas.index') }}">Lista de Unidad de medidas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ver Unidad Medida</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input disabled type="text" class="form-control" name="nombre" value="{{ $unidadmedida->nombre }}" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="nombre">Creado:</label>
                        <input disabled type="text" class="form-control" value="{{ $unidadmedida->created_at->format('d/m/Y H:i:s') }}" />
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="form-group">
                        <label for="nombre">Modificado:</label>
                        <input disabled type="text" class="form-control" value="{{ $unidadmedida->updated_at->format('d/m/Y H:i:s') }}" />
                    </div>
                </div>
            </div>
            <a href="{{route('unidadmedidas.index')}}" class="btn btn-sm btn-success">
                Volver
            </a>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('articulos.index') }}">Lista de Artículos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ver Artículo</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header bg-secondary text-white">
                    <i class="fa fa-list"></i>
                    Ver Artículo
                </h5>
                <div class="card-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input disabled type="text" class="form-control" value="{{ $articulo->nombre }}" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="nombre">Categoría:</label>
                                    <input disabled type="text" class="form-control" value="{{ isset($articulo->categoria) ? $articulo->categoria->nombre : '-' }}" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="nombre">Unidad de Medida:</label>
                                    <input disabled type="text" class="form-control" value="{{ isset($articulo->unidadmedida) ? $articulo->unidadmedida->nombre : '-' }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="nombre">Creado:</label>
                                    <input disabled type="text" class="form-control" value="{{ $articulo->created_at->format('d/m/Y H:i:s') }}" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="nombre">Modificado:</label>
                                    <input disabled type="text" class="form-control" value="{{ $articulo->updated_at->format('d/m/Y H:i:s') }}" />
                                </div>
                            </div>
                        </div>
                        <a href="{{route('articulos.index')}}" class="btn btn-sm btn-secondary">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

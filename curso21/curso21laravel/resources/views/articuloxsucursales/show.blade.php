@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('articuloxsucursales.index') }}">Lista de artículos por sucursales</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ver artículo por sucursal</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header bg-secondary text-white">
                    <i class="fa fa-box-full"></i>
                    Ver Artículo por sucursal
                </h5>
                <div class="card-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label>Artículo:</label>
                                    <input disabled type="text" class="form-control" value="{{ isset($articuloxsucursale->articulo) ? $articuloxsucursale->articulo->nombre : '-' }}" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label>Sucursal:</label>
                                    <input disabled type="text" class="form-control" value="{{ isset($articuloxsucursale->sucursal) ? $articuloxsucursale->sucursal->nombre : '-' }}" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label>Existencia:</label>
                                    <input disabled type="text" class="form-control" value="{{ $articuloxsucursale->existencia }}" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label>Stock Mínimo:</label>
                                    <input disabled type="text" class="form-control" value="{{ $articuloxsucursale->stockminimo }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="nombre">Creado:</label>
                                    <input disabled type="text" class="form-control" value="{{ $articuloxsucursale->created_at->format('d/m/Y H:i:s') }}" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="nombre">Modificado:</label>
                                    <input disabled type="text" class="form-control" value="{{ $articuloxsucursale->updated_at->format('d/m/Y H:i:s') }}" />
                                </div>
                            </div>
                        </div>
                        <a href="{{route('articuloxsucursales.index')}}" class="btn btn-sm btn-secondary">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

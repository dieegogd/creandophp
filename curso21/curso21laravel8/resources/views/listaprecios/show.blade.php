@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('listaprecios.index') }}">Lista de Precios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ver Precio</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header bg-secondary text-white">
                    <i class="fa fa-money"></i>
                    Ver Precio
                </h5>
                <div class="card-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label>Artículo:</label>
                                    <input disabled type="text" class="form-control" value="{{ isset($listaprecio->articulo) ? $listaprecio->articulo->nombre : '-' }}" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label>Localidad:</label>
                                    <input disabled type="text" class="form-control" value="{{ isset($listaprecio->localidad) ? $listaprecio->localidad->nombre : '-' }}" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label>Precio:</label>
                                    <input disabled type="text" class="form-control" value="{{ $listaprecio->precio }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="nombre">Creado:</label>
                                    <input disabled type="text" class="form-control" value="{{ $listaprecio->created_at->format('d/m/Y H:i:s') }}" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="nombre">Modificado:</label>
                                    <input disabled type="text" class="form-control" value="{{ $listaprecio->updated_at->format('d/m/Y H:i:s') }}" />
                                </div>
                            </div>
                        </div>
                        <a href="{{route('listaprecios.index')}}" class="btn btn-sm btn-secondary">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

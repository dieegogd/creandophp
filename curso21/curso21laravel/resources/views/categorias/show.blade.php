@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categorias.index') }}">Lista de Categorias</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ver Categoría</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header bg-secondary text-white">
                    <i class="fa fa-list"></i>
                    Ver Categoría
                </h5>
                <div class="card-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label>Nombre:</label>
                                    <input disabled type="text" class="form-control" value="{{ $categoria->nombre }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label>Creado:</label>
                                    <input disabled type="text" class="form-control" value="{{ $categoria->created_at->format('d/m/Y H:i:s') }}" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label>Modificado:</label>
                                    <input disabled type="text" class="form-control" value="{{ $categoria->updated_at->format('d/m/Y H:i:s') }}" />
                                </div>
                            </div>
                        </div>
                        <a href="{{route('categorias.index')}}" class="btn btn-sm btn-secondary">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categorias.index') }}">Lista de Categorias</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ver Categoria</li>
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
                        <input disabled type="text" class="form-control" name="nombre" value="{{ $categoria->nombre }}" />
                    </div>
                </div>
            </div>
            <a href="{{route('categorias.index')}}" class="btn btn-sm btn-success">
                Volver
            </a>
        </div>
    </div>
@endsection

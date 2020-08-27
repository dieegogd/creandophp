@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('articulos.index') }}">Lista de Artículos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Borrar Artículo</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            <br />
            @endif
            <form method="post" action="{{route('articulos.destroy', $articulo->id)}}">
                @csrf
                @method('DELETE')
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header bg-danger text-white">
                            <i class="fa fa-list"></i>
                            Borrar Artículo
                        </h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input disabled type="text" class="form-control" name="nombre" value="{{ $articulo->nombre }}" />
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
                            <button type="submit" class="btn btn-sm btn-danger">
                                Borrar
                            </button>
                            <a href="{{route('articulos.index')}}" class="btn btn-sm btn-link">
                                Cancelar
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

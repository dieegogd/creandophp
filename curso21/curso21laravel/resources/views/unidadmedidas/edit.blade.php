@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('unidadmedidas.index') }}">Lista de Unidades Medidas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar unidad medida</li>
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
            <form method="post" action="{{route('unidadmedidas.update', $unidadmedida->id)}}">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" value="{{old('nombre', $unidadmedida->nombre)}}" />
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-success">
                    Guardar
                </button>
                <a href="{{route('unidadmedidas.index')}}" class="btn btn-sm btn-link">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
@endsection
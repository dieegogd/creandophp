@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('listaprecios.index') }}">Lista de Precios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Agregar Precio</li>
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
            <form method="post" action="{{route('listaprecios.store')}}">
                @csrf
                <div class="card">
                    <h5 class="card-header bg-success text-white">
                        <i class="fa fa-money"></i>
                        Agregar Precio
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="cuil">Artículo:</label>
                                    {{ Form::select('articulo_id', App\Articulo::orderBy('nombre')->pluck('nombre', 'id'), old('articulo_id'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="cuil">Localidad:</label>
                                    {{ Form::select('localidad_id', App\Localidad::orderBy('nombre')->pluck('nombre', 'id'), old('localidad_id'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="precio">Precio:</label>
                                    <input type="text" class="form-control " name="precio" value="{{old('precio')}}" placeholder="Precio" />
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success">
                            Guardar
                        </button>
                        <a href="{{route('listaprecios.index')}}" class="btn btn-sm btn-link">
                            Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

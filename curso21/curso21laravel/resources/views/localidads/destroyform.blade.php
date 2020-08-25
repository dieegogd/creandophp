@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('localidads.index') }}">Lista de Localidades</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Borrar Localidad</li>
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
            <form method="post" action="{{route('localidads.destroy', $localidad->id)}}">
                @csrf
                @method('DELETE')
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input disabled type="text" class="form-control" name="nombre" value="{{ $localidad->nombre }}" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                        <div class="form-group">
                            <label for="nombre">Creado:</label>
                            <input disabled type="text" class="form-control" value="{{ $localidad->created_at->format('d/m/Y H:i:s') }}" />
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                        <div class="form-group">
                            <label for="nombre">Modificado:</label>
                            <input disabled type="text" class="form-control" value="{{ $localidad->updated_at->format('d/m/Y H:i:s') }}" />
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-danger">
                    Borrar
                </button>
                <a href="{{route('localidads.index')}}" class="btn btn-sm btn-link">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
@endsection

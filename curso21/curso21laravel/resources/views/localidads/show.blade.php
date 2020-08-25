@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('localidads.index') }}">Lista de localidades</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ver Localidad</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input disabled type="text" class="form-control" name="nombre" value="{{ $localidad->nombre }}" />
                    </div>
                </div>
            </div>
            <a href="{{route('localidads.index')}}" class="btn btn-sm btn-success">
                Volver
            </a>
        </div>
    </div>
@endsection

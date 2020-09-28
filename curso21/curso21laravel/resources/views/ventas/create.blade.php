
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('ventas.index') }}">Lista de ventas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Agregar venta</li>
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
            <form method="post" action="{{route('ventas.store')}}">
                @csrf
                <div class="card">
                    <h5 class="card-header bg-success text-white">
                        <i class="fas fa-box-full"></i>
                        Agregar artículo en una sucursal
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="date">Fecha:</label>
                                    <input type="date" class="form-control " name="fecha" value="{{old('fecha',date('Y-m-d'))}}" placeholder="Fecha" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="cuil">cliente:</label>
                                    {{ Form::select('cliente_id', App\Cliente::orderBy('nombre')->pluck('nombre', 'id'), old('cliente_id'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="cuil">Sucursal:</label>
                                    {{ Form::select('sucursal_id', App\Sucursal::orderBy('nombre')->pluck('nombre', 'id'), old('sucursal_id'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="cuil">Localidad:</label>
                                    {{ Form::select('localidad_id', App\Localidad::orderBy('nombre')->pluck('nombre', 'id'), old('localidad'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                            
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="total">Total:</label>
                                    <input type="number" class="form-control " name="total" value="{{old('total')}}" placeholder="Total" />
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success">
                            Guardar
                        </button>
                        <a href="{{route('ventas.index')}}" class="btn btn-sm btn-link">
                            Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

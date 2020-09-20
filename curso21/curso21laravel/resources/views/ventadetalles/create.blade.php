
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('ventadetalles.index') }}">Lista de detalle de venta</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Agregar detalle  de venta</li>
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
            <form method="post" action="{{route('ventadetalles.store')}}">
                @csrf
                <div class="card">
                    <h5 class="card-header bg-success text-white">
                        <i class="fas fa-box-full"></i>
                        Agregar detalle de venta
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="cuil">Venta:</label>
                                    {{ Form::select('venta_id', App\Venta::orderBy('id')->pluck('id', 'id'), old('venta_id'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="cuil">Articulo:</label>
                                    {{ Form::select('articulo_id', App\Articulo::orderBy('nombre')->pluck('nombre', 'id'), old('articulo_id'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="cantidad">Cantidad:</label>
                                    <input type="text" class="form-control " name="cantidad" value="{{old('cantidad')}}" placeholder="Cantidad" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="precio">Precio:</label>
                                    <input type="text" class="form-control " name="precio" value="{{old('precio')}}" placeholder="Precio" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="subtotal">SubTotal:</label>
                                    <input type="text" class="form-control " name="subtotal" value="{{old('subtotal')}}" placeholder="SubTotal" />
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success">
                            Guardar
                        </button>
                        <a href="{{route('ventadetalles.index')}}" class="btn btn-sm btn-link">
                            Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

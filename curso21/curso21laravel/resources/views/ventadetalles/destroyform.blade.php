@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('ventadetalles.index') }}">Lista de detalle de ventas/a></li>
                    <li class="breadcrumb-item active" aria-current="page">Borrar detalle de venta</li>
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
            <form method="post" action="{{route('ventadetalles.destroy', $ventadetalle->id)}}">
                @csrf
                @method('DELETE')
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header bg-danger text-white">
                            <i class="fas fa-box-full"></i>
                            Borrar detalle de venta
                        </h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="form-group">
                                        <label>Venta:</label>
                                        <input disabled type="text" class="form-control" value="{{ isset($ventadetalle->venta) ? $ventadetalle->venta->id : '-' }}" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="form-group">
                                        <label>Artículo:</label>
                                        <input disabled type="text" class="form-control" value="{{ isset($ventadetalle->articulo) ? $ventadetalle->articulo->nombre : '-' }}" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="form-group">
                                        <label>Cantidad:</label>
                                        <input disabled type="text" class="form-control" value="{{ $ventadetalle->cantidad }}" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="form-group">
                                        <label>Precio:</label>
                                        <input disabled type="text" class="form-control" value="{{ $ventadetalle->precio }}" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="form-group">
                                        <label>SubTotal:</label>
                                        <input disabled type="text" class="form-control" value="{{ $ventadetalle->subtotal }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="form-group">
                                        <label>Creado:</label>
                                        <input disabled type="text" class="form-control" value="{{ $ventadetalle->created_at->format('d/m/Y H:i:s') }}" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="form-group">
                                        <label>Modificado:</label>
                                        <input disabled type="text" class="form-control" value="{{ $ventadetalle->updated_at->format('d/m/Y H:i:s') }}" />
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-danger">
                                Borrar
                            </button>
                            <a href="{{route('ventadetalles.index')}}" class="btn btn-sm btn-link">
                                Cancelar
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

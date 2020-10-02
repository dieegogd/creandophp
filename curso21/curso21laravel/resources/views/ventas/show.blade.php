@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('ventas.index') }}">Lista de ventas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ver venta</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header bg-secondary text-white">
                    <i class="fa fa-box-full"></i>
                    Ver venta
                </h5>
                <div class="card-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label>Fecha:</label>
                                    <input disabled type="text" class="form-control" value="{{ $venta->fecha }}" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label>Cliente:</label>
                                    <input disabled type="text" class="form-control" value="{{ isset($venta->cliente) ? $venta->cliente->nombre : '-' }}" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label>Sucursal:</label>
                                    <input disabled type="text" class="form-control" value="{{ isset($venta->sucursal) ? $venta->sucursal->nombre : '-' }}" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label>Localidad:</label>
                                    <input disabled type="text" class="form-control" value="{{ isset($venta->localidad) ? $venta->localidad->nombre : '-' }}" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Artículo</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($venta->ventadetalle as $ventadetalle)
                                            <tr>
                                                <td>{{ $ventadetalle->articulo->nombre }}</td>
                                                <td>{{ $ventadetalle->cantidad }}</td>
                                                <td>{{ $ventadetalle->precio }}</td>
                                                <td>{{ $ventadetalle->subtotal }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th><strong>Total</strong></th>
                                            <th><strong>{{ $venta->total }}</strong></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="nombre">Creado:</label>
                                    <input disabled type="text" class="form-control" value="{{ $venta->created_at->format('d/m/Y H:i:s') }}" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="nombre">Modificado:</label>
                                    <input disabled type="text" class="form-control" value="{{ $venta->updated_at->format('d/m/Y H:i:s') }}" />
                                </div>
                            </div>
                        </div>
                        <a href="{{route('ventas.index')}}" class="btn btn-sm btn-secondary">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

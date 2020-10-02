@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Agregar detalle de venta</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        @if(session()->get('message'))
            <div class="col-12">
                <div class="alert alert-{{ session()->get('type') ?? 'message' }}">{{session()->get('message')}}</div>
            </div>
        @endif
        <div class="col-12">
            <div class="card">
                <h5 class="card-header bg-success text-white">
                    <i class="fas fa-box-full"></i>
                    Agregar detalle de venta en una sucursal
                </h5>
                <div class="card-body">
                    {{ Form::open(['url' => route('ventadetalles.index'), 'method' => 'post', 'id' => 'grid_filter_form']) }}
                        <input type="hidden" name="venta_id" value="{{ $venta->id }}">
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
                            @if ($errors->any())
                                <div class="col-12">
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="cuil">Articulo:</label>
                                    <input type="text" class="form-control" value="" id="articulo_nombre" placeholder="Artículo" />
                                    <input type="hidden" name="articulo_id" value="" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="cantidad">Cantidad:</label>
                                    <input type="numeric" class="form-control calculateSubtotal" name="cantidad" value="{{old('cantidad')}}" placeholder="Cantidad" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="precio">Precio:</label>
                                    <input type="numeric" class="form-control calculateSubtotal" name="precio" value="{{old('precio')}}" placeholder="Precio" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="subtotal">SubTotal:</label>
                                    <input id="subtotal" type="numeric" class="form-control" value="0" readonly="readonly" disabled="disabled" />
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm btn-success">
                                    Agregar Item
                                </button>
                                <a href="{{route('ventas.index')}}" class="btn btn-sm btn-secondary">
                                    Finalizar
                                </a>
                                <a href="{{route('ventas.destroyform', $venta->id)}}" class="btn btn-sm btn-danger">
                                    Cancelar
                                </a>
                            </div>
                        </div>
                    {{ Form::close() }}
                    <br />
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Artículo</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($venta->ventadetalle as $ventadetalle)
                                    <tr>
                                        <td>{{ $ventadetalle->articulo->nombre }}</td>
                                        <td>{{ $ventadetalle->cantidad }}</td>
                                        <td>{{ $ventadetalle->precio }}</td>
                                        <td>{{ $ventadetalle->subtotal }}</td>
                                        <td style="white-space: nowrap;">
                                            <form method="post" action="{{route('ventadetalles.destroy', $ventadetalle->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i> Borrar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th><strong>Total</strong></th>
                                    <th><strong>{{ $venta->total }}</strong></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(function(){
        $('.calculateSubtotal').keyup(function(){
            $('#subtotal').val(
                $('[name="cantidad"].calculateSubtotal').val() * $('[name="precio"].calculateSubtotal').val()
            );
        });
        $('#articulo_nombre').autocomplete({
            source: "{{ route('articulos.autocompletar', [$venta->sucursal->id, $venta->localidad->id]) }}",
            minLength: 1,
            select: function( event, ui ) {
                $('#articulo_nombre').val(ui.item.label);
                $('input[name="articulo_id"]').val(ui.item.value);
                $('input[name="precio"]').val(ui.item.precio);

                return false;
            }
        });
    });
    </script>
@endsection

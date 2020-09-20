@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista de artículos por sucursales</li>
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
                <h5 class="card-header bg-dark text-white">
                    <i class="fas fa-box-full"></i>
                    Listado de artículos por sucursales
                </h5>
                <div class="card-body">
                    <div class="col-12">
                        {{ $articuloxsucursales->links() }}
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            {{ Form::open(['url' => route('articuloxsucursales.index'), 'method' => 'get', 'id' => 'grid_filter_form']) }}
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            @foreach (App\Articuloxsucursale::FILTERED as $key => $value)
                                                <td>
                                                    <input
                                                        @if (substr($key, -3, 3) == '_at')
                                                            type="date"
                                                            class="form-control form-control-sm datepicker"
                                                        @else
                                                            type="text"
                                                            class="form-control form-control-sm"
                                                        @endif
                                                        name="search[{{ $key }}]"
                                                        value="{{ isset($search[$key]) ? $search[$key] : '' }}"
                                                        placeholder="{{ $value }}"
                                                    >
                                                </td>
                                            @endforeach
                                            <td>
                                                <button type="submit" class="btn btn-sm btn-success">Buscar</button>
                                                <a href="{{ route('articuloxsucursales.index') }}" class="btn btn-sm btn-secondary">
                                                    Limpiar
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>N°</th>
                                            <th>Artículo</th>
                                            <th>Sucursal</th>
                                            <th>Existencia</th>
                                            <th>Stock Minimo</th>
                                            <th>Creado</th>
                                            <th>Modificado</th>
                                            <th>
                                                <a href="{{ route('articuloxsucursales.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Agregar</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($articuloxsucursales))
                                            @foreach ($articuloxsucursales as $articuloxsucursale)
                                                <tr>
                                                    <th scope="row">{{ $articuloxsucursale->id }}</th>
                                                    <td>{{ isset($articuloxsucursale->articulo) ? $articuloxsucursale->articulo->nombre : '-' }}</td>
                                                    <td>{{ isset($articuloxsucursale->sucursal) ? $articuloxsucursale->sucursal->nombre : '-' }}</td>
                                                    <td> {{ $articuloxsucursale->existencia }}</td>
                                                    <td> {{ $articuloxsucursale->stockminimo }}</td>
                                                    <td>{{ $articuloxsucursale->created_at ? Carbon\Carbon::parse($articuloxsucursale->created_at)->format('d/m/Y H:i').'hs' : ''}}</td>
                                                    <td>{{ $articuloxsucursale->updated_at ? Carbon\Carbon::parse($articuloxsucursale->updated_at)->format('d/m/Y H:i').'hs' : ''}}</td>
                                                    <td style="white-space: nowrap;">
                                                        <a href="{{ route('articuloxsucursales.show', $articuloxsucursale->id) }}" class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i> Ver</a>
                                                        <a href="{{ route('articuloxsucursales.edit', $articuloxsucursale->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Editar</a>
                                                        <a href="{{ route('articuloxsucursales.destroyform', $articuloxsucursale->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Borrar</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="100%">
                                                    Ups! nada por aquí!<br />
                                                    Esta es una buena ocasión para que agregues un nuevo artículo,<br />
                                                    utiliza el botón verde que se encuentra arriba a la derecha.
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="100%">
                                                {{ $articuloxsucursales->total() }} Items.
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista de Clientes</li>
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
                    <i class="fa fa-id-badge"></i>
                    Listado de Clientes
                </h5>
                <div class="card-body">
                    <div class="col-12">
                        {{ $clientes->links() }}
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            {{ Form::open(['url' => route('clientes.index'), 'method' => 'get', 'id' => 'grid_filter_form']) }}
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            @foreach (App\Cliente::FILTERED as $key => $value)
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
                                                <a href="{{ route('clientes.index') }}" class="btn btn-sm btn-secondary">
                                                    Limpiar
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>N°</th>
                                            <th>Nombre</th>
                                            <th>Creado</th>
                                            <th>Modificado</th>
                                            <th>
                                                <a href="{{ route('clientes.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Agregar</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($clientes))
                                            @foreach ($clientes as $cliente)
                                                <tr>
                                                    <th scope="row">{{ $cliente->id }}</th>
                                                    <td>{{ $cliente->nombre }}</td>
                                                    <td>{{ $cliente->created_at ? Carbon\Carbon::parse($cliente->created_at)->format('d/m/Y H:i').'hs' : ''}}</td>
                                                    <td>{{ $cliente->updated_at ? Carbon\Carbon::parse($cliente->updated_at)->format('d/m/Y H:i').'hs' : ''}}</td>
                                                    <td style="white-space: nowrap;">
                                                        <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i> Ver</a>
                                                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Editar</a>
                                                        <a href="{{ route('clientes.destroyform', $cliente->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Borrar</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="100%">
                                                    Ups! nada por aquí!<br />
                                                    Esta es una buena ocasión para que agregues un nuevo cliente,<br />
                                                    utiliza el botón verde que se encuentra arriba a la derecha.
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="100%">
                                                {{ $clientes->total() }} Items.
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

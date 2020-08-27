@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista de Unidad de Medidas</li>
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
            {{ $unidadmedidas->links() }}
        </div>
        <div class="col-12">
            <div class="card">
                <h5 class="card-header bg-dark text-white">
                    <i class="fa fa-ruler-combined"></i>
                    Listado de Unidades de Medidas
                </h5>
                <div class="card-body">
                    <div class="col-12">
                        <div class="table-responsive">
                            {{ Form::open(['url' => route('unidadmedidas.index'), 'method' => 'get', 'id' => 'grid_filter_form']) }}
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            @foreach (App\Unidadmedida::FILTERED as $key => $value)
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
                                                <a href="{{ route('unidadmedidas.index') }}" class="btn btn-sm btn-secondary">
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
                                                <a href="{{ route('unidadmedidas.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Agregar</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($unidadmedidas))
                                            @foreach ($unidadmedidas as $unidadmedida)
                                                <tr>
                                                    <th scope="row">{{ $unidadmedida->id }}</th>
                                                    <td>{{ $unidadmedida->nombre }}</td>
                                                    <td>{{ $unidadmedida->created_at ? Carbon\Carbon::parse($unidadmedida->created_at)->format('d/m/Y H:i').'hs' : ''}}</td>
                                                    <td>{{ $unidadmedida->updated_at ? Carbon\Carbon::parse($unidadmedida->updated_at)->format('d/m/Y H:i').'hs' : ''}}</td>
                                                    <td style="white-space: nowrap;">
                                                        <a href="{{ route('unidadmedidas.show', $unidadmedida->id) }}" class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i> Ver</a>
                                                        <a href="{{ route('unidadmedidas.edit', $unidadmedida->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Editar</a>
                                                        <a href="{{ route('unidadmedidas.destroyform', $unidadmedida->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Borrar</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="100%">
                                                    Ups! nada por aquí!<br />
                                                    Esta es una buena ocasión para que agregues una nueva unidad medida,<br />
                                                    utiliza el botón verde que se encuentra arriba a la derecha.
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="100%">
                                                {{ $unidadmedidas->total() }} Items.
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

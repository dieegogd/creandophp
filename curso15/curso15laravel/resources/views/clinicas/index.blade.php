@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Lista de Clínicas
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <h5 class="card-header bg-dark text-white">
            <i class="fa fa-group"></i>
            Lista de Clínicas
        </h5>
        <div class="card-body">
            <div class="row">
                @if (session()->get('message'))
                    <div class="col-12">
                        <div class="alert alert-{{ session()->get('type') }}">{{ session()->get('message') }}</div>
                    </div>
                @endif
                <div class="col-12">
                    <div class="table-responsive">
                        {{ Form::open(['url' => route('clinicas.index'), 'method' => 'get', 'id' => 'grid_filter_form']) }}
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        @foreach (App\Clinica::FILTERED as $filter)
                                            <td>
                                                <input
                                                    @if (substr($filter, -3, 3) == '_at')
                                                        type="date"
                                                        class="form-control form-control-sm datepicker"
                                                    @else
                                                        type="text"
                                                        class="form-control form-control-sm"
                                                    @endif
                                                    name="search[{{ $filter }}]"
                                                    value="{{ isset($search[$filter]) ? $search[$filter] : '' }}"
                                                >
                                            </td>
                                        @endforeach
                                        <td>
                                            <button type="submit" class="btn btn-sm btn-success">Buscar</button>
                                            <a href="{{ route('clinicas.index') }}" class="btn btn-sm btn-secondary">
                                                Limpiar
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nombre</th>
                                        <th>Dirección</th>
                                        <th>Teléfono</th>
                                        <th>Fax</th>
                                        <th>Email</th>
                                        <th>Creado</th>
                                        <th>
                                            <a href="{{ route('clinicas.create') }}" class="btn btn-sm btn-success">
                                                <i class="fa fa-plus"></i> Agregar
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($clinicas))
                                        @foreach($clinicas as $clinica)
                                            <tr>
                                                <td scope="row">{{ $clinica->id }}</td>
                                                <td>{{ $clinica->nombre }}</td>
                                                <td>{{ $clinica->direccion }}</td>
                                                <td>{{ $clinica->telefono }}</td>
                                                <td>{{ $clinica->fax }}</td>
                                                <td>{{ $clinica->email }}</td>
                                                <td>{{ $clinica->created_at->format('d/m/Y') }}</td>
                                                <td style="white-space: nowrap;">
                                                    <a href="{{ route('clinicas.show', $clinica->id) }}" class="btn btn-sm btn-secondary">
                                                        <i class="fa fa-eye"></i>
                                                        Ver
                                                    </a>
                                                    <a href="{{ route('clinicas.edit', $clinica->id) }}" class="btn btn-sm btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                        Editar
                                                    </a>
                                                    <a href="{{ route('clinicas.destroyform', $clinica->id) }}" class="btn btn-sm btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                        Borrar
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="100%">
                                                ups! nada por aquí
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="100%">
                                            <div class="float-left mr-3">
                                                {{ $clinicas->appends(compact('paginate', 'search'))->links() }}
                                            </div>
                                            <div class="float-left mr-3">
                                                {{ Form::select('paginate', App\Clinica::PAGINATE_LIST, $paginate, ['class' => 'form-control change-submit', 'data-form' => 'grid_filter_form']) }}
                                            </div>
                                            <div class="float-left mr-3">
                                                {{ $clinicas->total() }} Items.
                                            </div>
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
@endsection

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
                        Lista de Roles
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <h5 class="card-header text-white {{ $option == 'recycle' ? 'bg-success' : 'bg-dark' }}">
            <i class="fa {{ $option == 'recycle' ? 'fa-trash' : 'fa-group' }}"></i>
            Lista de Roles
            @if ($option == 'recycle')
            - Papelera
            @endif
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
                        {{ Form::open(['url' => route('roles.index'), 'method' => 'get', 'id' => 'grid_filter_form']) }}
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        @foreach (App\Rol::FILTERED as $filter)
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
                                            <a href="{{ route('roles.index') }}" class="btn btn-sm btn-secondary">
                                                Limpiar
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nombre</th>
                                        <th>Ambiente</th>
                                        <th>Creado</th>
                                        <th>Modificado</th>
                                        <th>
                                            @if ($option == 'recycle')
                                                <input type="hidden" name="option" value="recycle">
                                                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-secondary">
                                                    <i class="fa fa-group"></i> Lista de Roles
                                                </a>
                                            @else
                                                @can('roles_store')
                                                    <a href="{{ route('roles.create') }}" class="btn btn-sm btn-success">
                                                        <i class="fa fa-plus"></i> Agregar
                                                    </a>
                                                @endcan
                                                @can('roles_recycle')
                                                    <button name="option" value="recycle" class="btn btn-sm btn-success">
                                                        <i class="fa fa-trash"></i> Papelera
                                                    </button>
                                                @endcan
                                            @endif
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($roles))
                                        @foreach($roles as $rol)
                                            <tr>
                                                <td scope="row">{{ $rol->id }}</td>
                                                <td>{{ $rol->name }}</td>
                                                <td>{{ $rol->guard_name }}</td>
                                                <td>{{ $rol->created_at->format('d/m/Y') }}</td>
                                                <td>{{ isset($rol->updated_at) ? $rol->updated_at->format('d/m/Y') : '' }}</td>
                                                <td style="white-space: nowrap;">
                                                    @if ($option == 'recycle')
                                                        @can('roles_restore')
                                                            <a href="{{ route('roles.restore', $rol->id) }}" class="btn btn-sm btn-success">
                                                                <i class="fa fa-recycle"></i>
                                                                Restaurar
                                                            </a>
                                                        @endcan
                                                        @can('roles_forcedelete')
                                                            <a href="{{ route('roles.forcedelete', $rol->id) }}" class="btn btn-sm btn-danger">
                                                                <i class="fa fa-trash"></i>
                                                                Eliminar
                                                            </a>
                                                        @endcan
                                                    @else
                                                        @can('roles_show')
                                                            <a href="{{ route('roles.show', $rol->id) }}" class="btn btn-sm btn-secondary">
                                                                <i class="fa fa-eye"></i>
                                                                Ver
                                                            </a>
                                                        @endcan
                                                        @can('roles_update')
                                                            <a href="{{ route('roles.edit', $rol->id) }}" class="btn btn-sm btn-primary">
                                                                <i class="fa fa-edit"></i>
                                                                Editar
                                                            </a>
                                                        @endcan
                                                        @can('roles_destroy')
                                                            <a href="{{ route('roles.destroyform', $rol->id) }}" class="btn btn-sm btn-danger">
                                                                <i class="fa fa-trash"></i>
                                                                Borrar
                                                            </a>
                                                        @endcan
                                                    @endif
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
                                                {{ $roles->appends(compact('paginate', 'search', 'option'))->links() }}
                                            </div>
                                            <div class="float-left mr-3">
                                                {{ Form::select('paginate', App\Rol::PAGINATE_LIST, $paginate, ['class' => 'form-control change-submit', 'data-form' => 'grid_filter_form']) }}
                                            </div>
                                            <div class="float-left mr-3">
                                                {{ $roles->total() }} Items.
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

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
    <div class="row">
        @if (session()->get('message'))
            <div class="col-12">
                <div class="alert alert-{{ session()->get('type') }}">{{ session()->get('message') }}</div>
            </div>
        @endif
        <div class="col-12">
            {{ $clinicas->links() }}
        </div>
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Cuil</th>
                        <th>Fax</th>
                        <th>Email</th>
                        <th>Creado</th>
                        <th>Modificado</th>
                        <th>Acciones</th>
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
                                <td>{{ $clinica->cuil }}</td>
                                <td>{{ $clinica->fax }}</td>
                                <td>{{ $clinica->email }}</td>
                                <td>{{ $clinica->created_at }}</td>
                                <td>{{ $clinica->updated_at }}</td>
                                <td colspan="2" style="white-space: nowrap;">
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
                        <th colspan="100%">{{ $clinicas->total() }} Items.</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

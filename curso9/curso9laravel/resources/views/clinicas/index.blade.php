<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clínicas</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col align-self-start">
                <h1>Clinicas</h1>
            </div>
            <div class="col align-self-center">
                <a href="{{ route('clinicas.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Agregar</a>
            </div>
            <div class="col align-self-end">
                by Diego
            </div>
        </div>

        <table class="table">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Fax</th>
                <th>Email</th>
                <th>Creado</th>
                <th>Modificado</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach ($clinicas as $clinica)
                <tr>
                    <td>{{ $clinica->id }}</td>
                    <td>{{ $clinica->nombre }}</td>
                    <td>{{ $clinica->direccion }}</td>
                    <td>{{ $clinica->telefono }}</td>
                    <td>{{ $clinica->fax }}</td>
                    <td>{{ $clinica->email }}</td>
                    <td>{{ $clinica->created_at ? Carbon\Carbon::parse($clinica->created_at)->format('d/m/Y H:i').'hs' : ''}}</td>
                    <td>{{ $clinica->updated_at ? Carbon\Carbon::parse($clinica->updated_at)->format('d/m/Y H:i').'hs' : ''}}</td>
                    <td style="white-space: nowrap;">
                        <a href="{{ route('clinicas.show', $clinica->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Ver</a>
                        <a href="{{ route('clinicas.edit', $clinica->id) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Editar</a>
                        <a href="{{ route('clinicas.destroy', $clinica->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Borrar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


<div class="container">
    <div class="row">
        <div class="col align-self-start">
            <h1>Clinicas</h1>
        </div>
        <div class="col align-self-center">
            <a href="{{ route('clinicas.create') }}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Agregar</a>
        </div>
        <div class="col align-self-end">
            by Diego
        </div>
    </div>

    <table class="table">
        <thead>
            <th>id</th>
            <th>nombre</th>
            <th>direccion</th>
            <th>telefono</th>
            <th>fax</th>
            <th>email</th>
            <th>creado</th>
            <th>modificado</th>
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
                <td>{{ $clinica->created_at }}</td>
                <td>{{ $clinica->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



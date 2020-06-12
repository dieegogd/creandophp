<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<div class="card uper">
    <div class="card-header">
        Agregar Clínica
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            <br />
        @endif
        <form method="post" action="{{route('clinicas.store')}}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" name="direccion" value="{{old('direccion')}}" />
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="telefono">Telefono:</label>
                        <input type="text" class="form-control" name="telefono" value="{{old('telefono')}}" />
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="fax">Fax:</label>
                        <input type="text" class="form-control" name="fax" value="{{old('fax')}}" />
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" value="{{old('email')}}" />
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-success">Agregar</button>
            <a href="{{route('clinicas.index')}}" class="btn btn-sm btn-light">Cancelar</a>
        </form>
    </div>
</div>

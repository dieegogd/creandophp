<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agregar Clínica</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body>
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
                            <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}" placeholder="Nombre" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" class="form-control" name="direccion" value="{{old('direccion')}}" placeholder="Dirección" />
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="telefono">Telefono:</label>
                            <input type="text" class="form-control" name="telefono" value="{{old('telefono')}}" placeholder="Teléfono" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="fax">Fax:</label>
                            <input type="text" class="form-control" name="fax" value="{{old('fax')}}" placeholder="Fax" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                </div>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-success">
                    <i class="fa fa-save"></i>
                    Agregar
                </button>
                <a href="{{route('clinicas.index')}}" class="btn btn-sm btn-light">
                    <i class="fa fa-times"></i>
                    Cancelar
                </a>
            </form>
        </div>
    </div>

</body>
</html>

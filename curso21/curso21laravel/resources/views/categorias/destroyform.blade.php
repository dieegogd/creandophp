<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ env('APP_NAME', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>
                    LaraSystem
                    <span class="badge badge-secondary">v1.0</span>
                </h3>
            </div>
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('categorias.index') }}">Lista de Categorias</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Borrar Categoria</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
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
                <form method="post" action="{{route('categorias.destroy', $categoria->id)}}">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input disabled type="text" class="form-control" name="nombre" value="{{ $categoria->nombre }}" />
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-danger">
                        Borrar
                    </button>
                    <a href="{{route('categorias.index')}}" class="btn btn-sm btn-link">
                        Cancelar
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

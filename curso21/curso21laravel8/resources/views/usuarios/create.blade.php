@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}">Lista de Usuarios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Agregar Usuario</li>
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
            <form method="post" action="{{route('usuarios.store')}}">
                @csrf
                <div class="card">
                    <h5 class="card-header bg-success text-white">
                        <i class="fa fa-list"></i>
                        Agregar Usuario
                    </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="name">Nombre:</label>
                                    <input type="text" class="form-control " name="name" value="{{old('name')}}" placeholder="Nombre" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control " name="email" value="{{old('email')}}" placeholder="Email" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="password">Contraseña:</label>
                                    <input type="password" class="form-control " name="password" value="{{old('password')}}" placeholder="Contraseña" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label for="password_confirmation">Repetir Contraseña:</label>
                                    <input type="password" class="form-control " name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="Repetir Contraseña" />
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success">
                            Guardar
                        </button>
                        <a href="{{route('usuarios.index')}}" class="btn btn-sm btn-link">
                            Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

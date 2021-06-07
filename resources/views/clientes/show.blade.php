@extends('layouts.template')
@section('title', 'Mostar Cliente')
@section('content')

    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="fas fa-user"></i> Cliente</h1>

                    <h5 class="text-white op-7 mb-2"><i class="far fa-building"></i> Cliente</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">


                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title"><i class="icon-globe"></i> Bienvenido</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">


                                <div class="form-group">
                                    <label for="canton_id">Cantón-Provincia:</label>
                                    <select class="chosen-select form-control" id="canton_id" name="canton_id"
                                        data-placeholder="Cantón" disabled>
                                        <option value="{{ $cliente->canton->id }}">
                                            {{ $cliente->canton->name }}-{{ $cliente->canton->provincia->name }}
                                        </option>

                                    </select>
                                    @error('canton_id')
                                        <div class="alert alert-danger" role="alert">
                                            <small>{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="cedula">Fecha de Nacimiento:</label>
                                    <input type="date" name="fechanacimiento" disabled class="form-control"
                                        placeholder="Fecha de Nacimiento"
                                        value="{{ old('fechanacimiento', $cliente->fechanacimiento) }}">
                                    @error('fechanacimiento')
                                        <div class="alert alert-danger" role="alert">
                                            <small>{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" disabled onKeyPress="return sololetrascoma(event)"
                                class="form-control" placeholder="Nombre" value="{{ old('nombre', $cliente->nombre) }}">
                            @error('nombre')
                                <div class="alert alert-danger" role="alert">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido:</label>
                            <input type="text" name="apellido" disabled onKeyPress="return sololetrascoma(event)"
                                class="form-control" placeholder="Apellido"
                                value="{{ old('apellido', $cliente->apellido) }}">
                            @error('apellido')
                                <div class="alert alert-danger" role="alert">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="cedula">Cedula:</label>

                            <input type="number" name="cedula" disabled id="cedula" class="form-control"
                                placeholder="Cedula" value="{{ old('cedula', $cliente->cedula) }}" minlength="10"
                                onKeyPress="return soloNumeros(event)" maxlength="10">
                            @error('cedula')
                                <div class="alert alert-danger" role="alert">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="cedula">Dirección:</label>

                            <input type="text" name="direccion" disabled class="form-control" placeholder="Dirección"
                                value="{{ old('direccion', $cliente->direccion) }}">
                            @error('direccion')
                                <div class="alert alert-danger" role="alert">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cedula">Cdla o Recinto:</label>

                            <input type="text" name="cdaorecinto" disabled class="form-control" placeholder="Cdla o Recinto"
                                value="{{ old('cdaorecinto', $cliente->cdaorecinto) }}">
                            @error('cdaorecinto')
                                <div class="alert alert-danger" role="alert">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="cedula">GPS:</label>
                            <input type="text" name="gps" disabled class="form-control" placeholder="GPS"
                                value="{{ old('gps', $cliente->gps) }}">
                            @error('gps')
                                <div class="alert alert-danger" role="alert">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cedula">Cantacto 1:</label>
                            <input type="text" name="contacto" disabled onKeyPress="return soloNumeros(event)"
                                class="form-control" placeholder="Contacto 1"
                                value="{{ old('contacto', $cliente->contacto) }}">
                            @error('contacto')
                                <div class="alert alert-danger" role="alert">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="cedula">Cantacto 2:</label>
                            <input type="text" name="contacto1" disabled onKeyPress="return soloNumeros(event)"
                                class="form-control" placeholder="Contacto 2"
                                value="{{ old('contacto1', $cliente->contacto1) }}">
                            @error('contacto1')
                                <div class="alert alert-danger" role="alert">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="cedula">Correo Electronico:</label>
                            <input type="email" name="email" disabled class="form-control" placeholder="Correo Electronico"
                                value="{{ old('email', $cliente->email) }}">
                            @error('email')
                                <div class="alert alert-danger" role="alert">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="servicio">Servicio Radio o fibra:</label>
                            <input type="text" name="servicio" disabled class="form-control"
                                placeholder="Correo Electronico" value=" @if ($cliente->servicio ==
                            1) Radio @endif
                            @if ($cliente->servicio == 0)Fibra @endif">
                                @error('servicio')
                                    <div class="alert alert-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                        </div>
                        <div class="ml-md-auto py-2 py-md-0">
                            <a href="{{ route('clientes.index') }}" class="btn btn-primary btn-border btn-round mr-2"><i
                                    class="fas fa-reply"></i>
                                Volver</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{ asset('img/ppp.jpg') }}" style="width: 100%; height:550px;" alt="...">

                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">

                                <a href="{{ asset($cliente->ffoto) }}" data-lightbox="mygallery"
                                    data-title="{{ $cliente->nombre }} {{ $cliente->apellido }}">
                                    <img class="avatar border-gray" src="{{ asset($cliente->ffoto) }}" title="ver imagen"
                                        class="img-fluid center" alt="Responsive image"
                                        style="width:150px; height:350px;"></a>
                                <h3 style="font-size: 20px;" class="title">
                                    {{ $cliente->nombre }}<br> {{ $cliente->apellido }}
                                </h3>
                            </a>
                            <p class="description">
                                {{ $cliente->email }}
                            </p>
                        </div>
                        <p class="description text-center">
                            “No será fácil<br> pero merecerá la pena.”
                        </p>
                    </div>
                    <hr>
                    <div class="button-container">
                        <br>
                        <a href="https://www.facebook.com/quantikaEcuador" data-title="Facebook" target="_blank"
                            class="btn btn-neutral btn-icon btn-round btn-lg">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')

@endsection

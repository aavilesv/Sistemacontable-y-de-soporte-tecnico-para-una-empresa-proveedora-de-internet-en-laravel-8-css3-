@extends('layouts.template')
@section('title', 'Editar Cliente')
@section('content')


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"> <i class="fas fa-user-alt"></i> EDITAR CLIENTE</h1>

                    <h5 class="text-white op-7 mb-2"><i class="fas fa-align-justify"></i> Registro Cliente</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title"> <i class="fas fa-address-card"> Formulario</i></div>
                        <div class="card-category"><i class="far fa-clipboard"></i> Registar</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">

                            <form action="{{ route('clientes.update', $cliente) }}" method="POST"
                                onsubmit="return todocedula()" class="form-control" enctype="multipart/form-data">
                                <!--estogenera el token de validacion  -->
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card full-height">
                                            <div class="card-header">
                                                <div class="card-title">

                                                    <i class="fas fa-user"></i> Datos Personales
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <ol class="activity-feed">
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">

                                                            <time class="date" datetime="9-25">Nombre</time>
                                                            <input type="text" name="nombre"
                                                                onKeyPress="return sololetrascoma(event)"
                                                                class="form-control roundss" placeholder="Nombres"
                                                                value="{{ old('nombre', $cliente->nombre) }}">
                                                            @error('nombre')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Apellido</time>
                                                            <input type="text" name="apellido"
                                                                onKeyPress="return sololetrascoma(event)"
                                                                class="form-control roundss" placeholder="Apellido"
                                                                value="{{ old('apellido', $cliente->apellido) }}">
                                                            @error('apellido')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Cédula</time>
                                                            <input type="text" name="cedula" id="cedula"
                                                                onKeyPress="return soloNumeros(event)" maxlength="13"
                                                                minlength="10" required class="form-control roundss"
                                                                placeholder="Cédula"
                                                                value="{{ old('cedula', $cliente->cedula) }}">
                                                            @error('cedula')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Fecha Nacimiento</time>
                                                            <input type="date" name="fechanacimiento"
                                                                class="form-control roundss" placeholder="Fecha Nacimiento"
                                                                value="{{ old('fechanacimiento', $cliente->fechanacimiento) }}">
                                                            @error('fechanacimiento')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Dirección</time>
                                                            <input type="text" name="direccion" class="form-control roundss"
                                                                placeholder="Dirección"
                                                                value="{{ old('direccion', $cliente->direccion) }}">
                                                            @error('direccion')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Cdla O Recinto</time>
                                                            <input type="text" name="cdaorecinto"
                                                                class="form-control roundss" placeholder="Cdla o Recinto"
                                                                value="{{ old('cdaorecinto', $cliente->cdaorecinto) }}">
                                                            @error('cdaorecinto')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Email</time>
                                                            <input type="email" name="email" class="form-control roundss"
                                                                placeholder="Correo Electronico : No requerido"
                                                                value="{{ old('email', $cliente->email) }}">
                                                            @error('email')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>

                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Contacto</time>
                                                            <input type="text" name="contacto" class="form-control roundss"
                                                                placeholder="Contacto:requerido "
                                                                value="{{ old('contacto', $cliente->contacto) }}"
                                                                onKeyPress="return soloNumeros(event)" minlength="10"
                                                                maxlength="10">
                                                            @error('contacto')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Contacto 2</time>
                                                            <input type="text" name="contacto1" class="form-control roundss"
                                                                placeholder="Contacto 2: no requerido "
                                                                value="{{ old('contacto1', $cliente->contacto1) }}"
                                                                onKeyPress="return soloNumeros(event)" minlength="10"
                                                                maxlength="10">
                                                            @error('contacto1')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>


                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card full-height">
                                            <div class="card-header">
                                                <div class="card-title">

                                                    <i class="flaticon-technology-1"></i> Datos Adicionales


                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <ol class="activity-feed">
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date col-12"
                                                                datetime="9-25">Cantón:Provincia</time>
                                                            <div class="col-md-9">
                                                                <select class="chosen-select form-control" id="canton_id"
                                                                    name="canton_id" data-placeholder="Sucursal">
                                                                    <option value="{{ $cliente->canton->id }}">
                                                                        Selecionado:
                                                                        {{ $cliente->canton->name }}-{{ $cliente->canton->provincia->name }}
                                                                    </option>
                                                                    @if ($action == 'new' or $action == 'edit')
                                                                        @foreach ($cantons as $canton)
                                                                            <option value="{{ $canton->id }}">
                                                                                {{ $canton->name }}-{{ $canton->provincia->name }}
                                                                            </option>
                                                                            s
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                                @error('canton_id')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <small>{{ $message }}</small>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a data-toggle="tooltip"
                                                                    data-original-title="Ingresar Ciudad"
                                                                    class="btn btn-success btn-sm rounded-circle"
                                                                    href="{{ route('cantons.create') }}" rel="action">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Servicio por Radio o
                                                                fibra</time>
                                                            <select class="chosen-select form-control" name="servicio"
                                                                data-placeholder="Sucursal">


                                                                <option value="{{ $cliente->servicio }}">Selecionado:
                                                                    @if ($cliente->servicio == 1)
                                                                        Radio
                                                                        @endif @if ($cliente->servicio == 0)
                                                                            Fibra
                                                                        @endif
                                                                </option>
                                                                <option value="1">Radio</option>
                                                                <option value="0">Fibra</option>
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">GPS</time>
                                                            <input type="text" name="gps" class="form-control"
                                                                placeholder="GPS"
                                                                value="{{ old('gps', $cliente->gps) }}">
                                                            @error('gps')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>



                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Latitud</time>
                                                            <input type="text" name="latitud" class="form-control"
                                                                placeholder="Ingresa los numeros por favor de google maps"
                                                                value="{{ old('latitud', $cliente->latitud) }}"
                                                                value="2">
                                                            @error('latitud')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Longitud</time>

                                                            <input type="text" name="longitud" class="form-control"
                                                                placeholder="Ingresa los numeros por favor de google maps"
                                                                value="{{ old('longitud', $cliente->longitud) }}">
                                                            @error('longitud')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Foto de Vivienda</time>
                                                            <input type="file" name="ffoto" accept="image/*"
                                                                class="form-control imagejs" placeholder="Foto Empleado"
                                                                value="{{ old('ffoto') }}">
                                                            @error('ffoto')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>

                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Foto de Cedula 1</time>
                                                            <input type="file" name="fcedula1" accept="image/*"
                                                                class="form-control imagejs"
                                                                placeholder="Correo Electronico"
                                                                value="{{ old('email') }}">
                                                            @error('foto')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>

                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Foto de Cedula 2</time>
                                                            <input type="file" name="fcedula2" accept="image/*"
                                                                class="form-control imagejs"
                                                                placeholder="Correo Electronico"
                                                                value="{{ old('email') }}">
                                                            @error('fcedula2')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-md-auto py-2 py-md-0">
                                    <a href="{{ route('clientes.index') }}"
                                        class="btn btn-danger btn-border btn-round mr-2"><i class="fas fa-reply"></i>
                                        Cancelar</a>
                                    <button class="btn btn-success btn-border btn-round mr-2" type="submit"><i
                                            class="fas fa-save"></i> Ingresar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')

@endsection

@extends('layouts.template')
@section('title', 'Recepción de Novedades')
@section('content')


<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h1 class="text-white title-it"> <i class="fas fa-phone-square"></i>
                    CREAR NOVEDAD</h1>
               
                <h5 class="text-white op-7 mb-2"><i class="icon-globe"></i> RECEPCIÓN</h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
             
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title"><i class="fas fa-align-justify"></i> Novedad</div>
                    <div class="card-category"><i class="fas fa-server"></i> Registro</div>
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
         
                       
                        <form action="{{ route('novedads.store') }}" method="POST" class="form-control">
                            <!--estogenera el token de validacion  -->
                            @csrf
                            <div class="row">
                                <div class="col-6">
                            <div class="form-group">
                                <label for="cliente_id">Nombre-Apellido-Cedula:</label>
                                <select class="chosen-select form-control" id="cliente_id" name="cliente_id"
                                    data-placeholder="Sucursal">
                                    <option value="" selected disabled hidden>Seleccione Los datos del cliente</option>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}" data-cjson='{"contacto1":"{{ $cliente->contacto1 }}","contacto":"{{ $cliente->contacto }}",
                                    "cdaorecinto":"{{ $cliente->canton->provincia->name }}-{{ $cliente->canton->name }}: {{ $cliente->cdaorecinto }} - {{ $cliente->direccion }}","gps":"{{ $cliente->gps }}"
                                    ,"email":"{{ $cliente->email }}"}'>{{ $cliente->nombre }} {{ $cliente->apellido }}
                                            {{ $cliente->cedula }}</option>
                                    @endforeach
            
                                </select>
                                @error('cliente_id')
                                    <div class="alert alert-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                        </div>
                            <div class="col-6">
                            <div class="form-group">
                                <label for="cedula">Provincia-Cantón: Cdla o Recinto - Dirección:</label>
            
                                <input type="text" name="cdaorecinto" id="cdaorecinto" disabled class="form-control"
                                    placeholder="Cdla o Recinto-Dirección" value="">
            
                            </div>
                        </div>
                        </div>
                            <div class="row">
            
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="cedula">Cantacto 1:</label>
                                        <input type="text" name="contacto" disabled id="contacto" onKeyPress="return soloNumeros(event)"
                                            class="form-control" placeholder="Contacto 1" value="">
            
                                    </div>
                                </div>
            
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="cedula">Cantacto 2:</label>
                                        <input type="text" name="contacto1" disabled id="contacto1"
                                            onKeyPress="return soloNumeros(event)" class="form-control" placeholder="Contacto 2"
                                            value="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="cedula">Correo Electronico:</label>
                                        <input type="email" name="email" id="email" disabled class="form-control"
                                            placeholder="Correo Electronico" value="">
            
                                    </div>
                                </div>
            
            
            
                            </div>
            
                           
                            <div class="form-group">
                                <label for="gps">GPS:</label>
                                <input type="text" name="gps" id="gps" class="form-control" disabled placeholder="GPS" value="">
                            </div>
                            <div class="form-group">
                                <label for="novedadopercance">Novedad o Percance:</label>
                                <select class="chosen-select form-control" name="novedadopercance" data-placeholder="Sucursal">
                                    <option value="" selected disabled hidden>Seleccione alguna Novedad</option>
            
                                    <option value="1">Instalación</option>
                                    <option value="2">Retiro de Equipo</option>
                                    <option value="3">Reinstalación</option>
                                    <option value="4">Intermitente</option>
                                    <option value="5">Lento</option>
                                    <option value="6">Desconf. Router</option>
                                    <option value="7">Cable. Dañado</option>
                                    <option value="8">Problema Equipos</option>
                                    <option value="9">Sin servicio</option>
                                    <option value="10">Otros</option>
                                </select>
                                @error('novedadopercance')
                                    <div class="alert alert-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
            
            
                            <div class="form-group">
                                <label for="especificar">Especificar:</label>
                                <textarea rows="5" class="form-control" name="especificar"
                                    placeholder="Si elige otros por favor especificar">{{ old('especificar') }}</textarea>
            
                                @error('especificar')
                                    <div class="alert alert-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
            
                           
                            <div class="ml-md-auto py-2 py-md-0">
                                <a href="{{ route('novedads.index') }}"
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

@section('scripts')
    <script>
        $('#alert_demo_7').click(function(e) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                buttons: {
                    confirm: {
                        text: 'Yes, delete it!',
                        className: 'btn btn-success'
                    },
                    cancel: {
                        visible: true,
                        className: 'btn btn-danger'
                    }
                }
            }).then((Delete) => {
                if (Delete) {
                    swal({
                        title: 'Deleted!',
                        text: 'Your file has been deleted.',
                        type: 'success',
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        }
                    });
                } else {
                    swal.close();
                }
            });
        });

        $('#cliente_id').change(function() {
            var cliente = $('#cliente_id option:selected').data('cjson');
            $('#contacto').val(cliente.contacto);
            //           $('#direccion').val(cliente.direc);
            $('#email').val(cliente.email);
            $('#gps').val(cliente.gps);
            $('#contacto1').val(cliente.contacto1);
            $('#cdaorecinto').val(cliente.cdaorecinto);

        });

    </script>
@endsection

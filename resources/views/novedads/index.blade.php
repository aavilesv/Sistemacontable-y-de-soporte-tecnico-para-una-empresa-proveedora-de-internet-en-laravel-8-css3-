@extends('layouts.template')
@section('title', 'Listado de Novedades')
@section('content')


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"> <i class="fas fa-phone-square"></i>
                        NOVEDADES</h1>

                    <h5 class="text-white op-7 mb-2"><i class="icon-globe"></i> RECEPCIÓN</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a class="btn btn-primary btn-round ml-auto" data-toggle="tooltip"
                        data-original-title="Imprimir todos los registros" target="_blank"
                        href="{{ route('pdfnovedad.novedadall') }}"><i class="icon-printer"></i> Imprimir</a>

                    <a class="btn btn-success btn-round ml-auto" data-toggle="tooltip" data-original-title="Ver"
                        href="{{ route('novedads.create') }}"><i class="fa fa-plus"></i> Ingresar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title"><i class="fas fa-align-justify"></i> Novedades Registradas</div>
                        <div class="card-category"><i class="fas fa-server"></i> Datos</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="table-responsive">
                                <table id="add-row" cellspacing="0"
                                    class="display table table-striped table-hover add-row nowrap">

                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Cliente</th>
                                            <th scope="col">Hora de percance</th>
                                            <th scope="col">Novedad de parcance</th>
                                            <th scope="col">Especificar</th>
                                            <th scope="col">Estado</th>

                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($novedads as $novedad)
                                            <tr data-id="{{ $novedad->id }}">
                                                <td>{{ $novedad->id }}</td>
                                                <td>{{ $novedad->cliente->nombre }} {{ $novedad->cliente->apellido }}</td>
                                                <td>{{ $novedad->horainciar }}</td>

                                                <td>
                                                    @if ($novedad->novedadopercance === 1)

                                                        <span class="badge badge-success">Instalación</span>
                                                    @elseif($novedad->novedadopercance === 2)
                                                        <span class="badge badge-info">Retiro de Equipo</span>
                                                    @elseif($novedad->novedadopercance === 3)
                                                        <span class="badge badge-warning">Reinstalación</span>
                                                    @elseif($novedad->novedadopercance === 4)
                                                        <span class="badge badge-danger">Intermitente</span>
                                                    @elseif($novedad->novedadopercance === 5)
                                                        <span class="badge badge-info">Lento</span>
                                                    @elseif($novedad->novedadopercance === 6)
                                                        <span class="badge badge-warning">Desconf. Router</span>
                                                    @elseif($novedad->novedadopercance === 7)
                                                        <span class="badge badge-warning">Cable. Dañado</span>
                                                    @elseif($novedad->novedadopercance === 8)
                                                        <span class="badge badge-info">Problema de Equipos</span>
                                                    @elseif($novedad->novedadopercance === 9)
                                                        <span class="badge badge-info">Sin servicio</span>
                                                    @elseif($novedad->novedadopercance === 10)
                                                        <span class="badge badge-info">Otros</span>
                                                    @endif
                                                </td>
                                                <td>{{ $novedad->especificar }}</td>
                                                <td>
                                                    @if ($novedad->estado === 1)

                                                        <span class="badge badge-success">Activo</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactivo</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a class="btn btn-link btn-info btn-lg" data-toggle="tooltip"
                                                            data-original-title="Imprimir registro" target="_blank"
                                                            href="{{ route('pdfnovedad.novedadgetone', $novedad->id) }}"><i
                                                                class="icon-printer"></i></a>

                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('scripts')
    <script>


    </script>
@endsection

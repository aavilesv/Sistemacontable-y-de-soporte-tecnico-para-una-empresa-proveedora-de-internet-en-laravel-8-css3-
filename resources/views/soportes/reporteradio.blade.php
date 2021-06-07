@extends('layouts.template')
@section('title', 'Reporte de radio')
@section('content')


    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="fas fa-golf-ball"></i> REPORTE DE RADIO
                    </h1>

                    <h5 class="text-white op-7 mb-2"><i class="far fa-building"></i> Soporte Tecnico</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">

                    <a class="btn btn-primary btn-round ml-auto" data-toggle="tooltip"
                        data-original-title="Imprimir todos los registros" target="_blank"
                        href="{{ route('pdffreporteradio.soporteallradio') }}"><i class="icon-printer"></i> Imprimir</a>

                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title"><i class="far fa-list-alt"></i> Listado</div>
                        <div class="card-category"><i class="fab fa-creative-commons-nd"></i> Reportes Registrados</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">

                            <div class="table-responsive">
                                <table id="add-row" cellspacing="0" width="100%"
                                    class="display table table-striped table-hover add-row nowrap">

                                    <thead>
                                        <tr>
                                            <th style="width: 10%">Action</th>
                                            <th scope="col">#</th>
                                            <th scope="col">Cliente:</th>
                                            <th scope="col">Cedula:</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Hora de llegada</th>
                                            <th scope="col">Hora de salida</th>
                                            <th scope="col">Antena -Configuración</th>
                                            <th scope="col">Router -Configuración</th>
                                            <th scope="col">Cambio clave wifi -Configuración</th>
                                            <th scope="col">Frecuencias-Configuración</th>
                                            <th scope="col">IP -Configuración</th>
                                            <th scope="col">RED -Configuración</th>
                                            <th scope="col">AP -Configuración</th>
                                            <th scope="col">Antena -Actualización</th>
                                            <th scope="col">Router -Actualización</th>
                                            <th scope="col">CCQ -Actualización</th>
                                            <th scope="col">SEÑAL -Actualización</th>
                                            <th scope="col">Conectores -Instalación</th>
                                            <th scope="col">Router -Instalación</th>
                                            <th scope="col">POE -Instalación</th>
                                            <th scope="col">N° Conectores</th>
                                            <th scope="col">N° y marca del Router</th>
                                            <th scope="col">Atena Anterior -Instalación</th>
                                            <th scope="col">Antena nueva -Instalación</th>
                                            <th scope="col">Tubo Galvanizado -Instalación</th>
                                            <th scope="col">Cable -Instalación</th>
                                            <th scope="col">Adiciono Caña -Instalación</th>
                                            <th scope="col">Tubo Aluminio -Instalación</th>
                                            <th scope="col">Metros de Cable -Instalación</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($soportefibraradio as $fibr)
                                            <tr data-id="{{ $fibr->id }}">

                                                <td>

                                                    <div class="form-button-action">

                                                        <a class="btn btn-link btn-info btn-lg" data-toggle="tooltip"
                                                            data-original-title="Imprimir registro" target="_blank"
                                                            href="{{ route('pdffreporteradio.soporteallgetoneradio', $fibr->id) }}"><i
                                                                class="icon-printer"></i></a>
                                                    </div>
                                                </td>
                                                <td>{{ $fibr->id }}

                                                </td>

                                                <td> {{ $fibr->novedad->cliente->nombre }}-{{ $fibr->novedad->cliente->apellido }}
                                                </td>
                                                <td> {{ $fibr->novedad->cliente->cedula }}
                                                </td>
                                                <td>{{ $fibr->fecha }}</td>
                                                <td>{{ $fibr->horallegada }}</td>
                                                <td>{{ $fibr->horasalida }}</td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->cantena == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif


                                                </td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->crouter == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->ccambiowiffi == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->cfrecuencias == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">{{ $fibr->cip }}</td>
                                                <td style="text-align: center;">{{ $fibr->cred }}</td>
                                                <td style="text-align: center;">{{ $fibr->cap }}</td>



                                                <td style="text-align: center;">
                                                    @if ($fibr->aanterior == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>



                                                <td style="text-align: center;">
                                                    @if ($fibr->arouter == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>

                                                <td style="text-align: center;">
                                                    {{ $fibr->accq }}
                                                </td>
                                                <td style="text-align: center;">
                                                    {{ $fibr->aseñal }}
                                                </td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->iconectores == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->irouter == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->ipoe == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">{{ $fibr->inconectores }}</td>
                                                <td style="text-align: center;">{{ $fibr->imarcadelrouter }}</td>
                                                <td style="text-align: center;">{{ $fibr->iantenaanterior }}</td>
                                                <td style="text-align: center;">{{ $fibr->iantenanueva }}</td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->itubogalvanizado == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->icable == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->iadicionocaña == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">
                                                    @if ($fibr->ituboaluminio == 1)
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckChecked"
                                                            style="background-color: blue; background: blue;" checked
                                                            disabled>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">
                                                    {{ $fibr->imetroscable }}
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

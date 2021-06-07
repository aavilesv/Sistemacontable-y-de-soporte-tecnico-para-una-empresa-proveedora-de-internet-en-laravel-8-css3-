@extends('layouts.template')
@section('title', 'Reporte de fibra')
@section('content')


<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h1 class="text-white title-it"><i class="icon-speedometer"></i> REPORTE DE FIBRA

                </h1>

                <h5 class="text-white op-7 mb-2"><i class="far fa-building"></i> Soporte Tecnico</h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">

                <a class="btn btn-primary btn-round ml-auto" data-toggle="tooltip"
                    data-original-title="Imprimir todos los registros" target="_blank"
                    href="{{ route('pdffreportefibra.soporteallfibra') }}"><i class="icon-printer"></i> Imprimir</a>

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
                                        <th scope="col">Onu -Configuración</th>
                                        <th scope="col">Router -Configuración</th>
                                        <th scope="col">Cambio clave wifi -Configuración</th>
                                        <th scope="col">Router-Actualización</th>
                                        <th scope="col">DBM -Instalación</th>
                                        <th scope="col">Upc -Instalación</th>
                                        <th scope="col">APC -Instalación</th>
                                        <th scope="col">ODB -Instalación</th>
                                        <th scope="col">Conectores -Instalación</th>
                                        <th scope="col">Router -Instalación</th>
                                        <th scope="col">Cable de Red -Instalación</th>
                                        <th scope="col">Onu Anterior -Instalación</th>
                                        <th scope="col">Cable fibra -Instalación</th>
                                        <th scope="col">N° Conectores -Instalación</th>
                                        <th scope="col">N° y Marca del Router -Instalación</th>
                                        <th scope="col">Onu Nueva -Instalación</th>
                                        <th scope="col">Metros de Cable Fibra -Instalación</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fibra as $fibr)
                                        <tr data-id="{{ $fibr->id }}">
                                           
                                            <td>
        
                                                <div class="form-button-action">
        
                                                    <a class="btn btn-link btn-info btn-lg" data-toggle="tooltip"
                                                        data-original-title="Imprimir registro" target="_blank"
                                                        href="{{ route('pdffreportefibra.soportegetonefibra', $fibr->id) }}"><i
                                                            class="icon-printer"></i></a>
                                                </div>
                                            </td>
                                            <td>{{ $fibr->id }}
                                                    
                                                  </td>
        
                                                  <td>    {{ $fibr->novedad->cliente->nombre }}-{{ $fibr->novedad->cliente->apellido }}
                                                    </td>
                                                    <td>    {{ $fibr->novedad->cliente->cedula }}
                                                    </td>
                                            <td>{{ $fibr->fecha }}</td>
                                            <td>{{ $fibr->horallegada }}</td>
                                            <td>{{ $fibr->horasalida }}</td>
                                            <td style="text-align: center;">
                                                @if ($fibr->conu==1)
                                                <input class="form-check-input" type="checkbox" value="" 
                                                id="flexCheckChecked" style="background-color: blue; background: blue;" checked disabled> 
                                                @endif
                                            
                                              
                                            </td>
                                            <td style="text-align: center;">
                                                @if ($fibr->crouter==1)
                                                <input class="form-check-input" type="checkbox" value="" 
                                                id="flexCheckChecked" style="background-color: blue; background: blue;" checked disabled> 
                                                @endif
                                              </td>
                                            <td style="text-align: center;">
                                                @if ($fibr->ccambiowiffi==1)
                                                <input class="form-check-input" type="checkbox" value="" 
                                                id="flexCheckChecked" style="background-color: blue; background: blue;" checked disabled> 
                                                @endif
                                             </td>
                                            <td style="text-align: center;">
                                                @if ($fibr->arouter==1)
                                                <input class="form-check-input" type="checkbox" value="" 
                                                id="flexCheckChecked" style="background-color: blue; background: blue;" checked disabled> 
                                                @endif
                                              </td>
                                            <td style="text-align: center;">{{ $fibr->idbm }}</td>
                                            <td style="text-align: center;">{{ $fibr->iupc }}</td>
                                            <td style="text-align: center;">{{ $fibr->iapc }}</td>
                                            <td style="text-align: center;">{{ $fibr->iodb }}</td>
                                            <td style="text-align: center;">
                                                @if ($fibr->iconectores==1)
                                                <input class="form-check-input" type="checkbox" value="" 
                                                id="flexCheckChecked" style="background-color: blue; background: blue;" checked disabled> 
                                                @endif
                                             </td>
                                            <td style="text-align: center;">
                                                @if ($fibr->irouter==1)
                                                <input class="form-check-input" type="checkbox" value="" 
                                                id="flexCheckChecked" style="background-color: blue; background: blue;" checked disabled> 
                                                @endif
                                               </td>
                                            <td style="text-align: center;">
                                                @if ($fibr->icablered==1)
                                                <input class="form-check-input" type="checkbox" value="" 
                                                id="flexCheckChecked" style="background-color: blue; background: blue;" checked disabled> 
                                                @endif
                                               </td>
                                            <td style="text-align: center;">{{ $fibr->ionuanterior }}</td>
                                            <td style="text-align: center;">
                                                @if ($fibr->icablefibra==1)
                                                <input class="form-check-input" type="checkbox" value="" 
                                                id="flexCheckChecked" style="background-color: blue; background: blue;" checked disabled> 
                                                @endif
                                              </td>
                                            <td style="text-align: center;">{{ $fibr->inconectores }}</td>
                                            <td style="text-align: center;">{{ $fibr->inmarcadelrouter }}</td>
                                            <td style="text-align: center;">{{ $fibr->ionunueva }}</td>
                                            <td style="text-align: center;">{{ $fibr->imetroscable }}</td>
        
        
                                          
        
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

@extends('layouts.template')
@section('title','Inicio')
@section('header')
   
    <head>
           {!! $map['js'] !!}
    </head>
@endsection
@section('content')


        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h1 class="text-white title-it"> <i class="fas fa-desktop"></i>
                            Bienvenido</h1>
                       
                        <h5 class="text-white op-7 mb-2"><i class="fas fa-signal"></i> Inicio</h5>
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
                            <div class="card-title"><i class="fas fa-map-marker-alt"></i>Google Maps</div>
                            <div class="card-category">Ubicación de Clientes</div>
                            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                {!! $map['html'] !!}
                             
                            </div>
                        </div>
                    </div>
                </div>

            </div>
       
        </div>


@endsection



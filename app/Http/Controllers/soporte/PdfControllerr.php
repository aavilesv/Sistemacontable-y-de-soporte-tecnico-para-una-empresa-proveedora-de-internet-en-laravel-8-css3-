<?php

namespace App\Http\Controllers\soporte;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Soporte\Novedad;
use App\Models\Soporte\Soportefibra;
use App\Models\Soporte\Soporteradio;
use PDF;
use Illuminate\Http\Request;

class PdfControllerr extends Controller
{
    public function clientespdfall(){
       
        $clientes= Cliente::where('eliminar','=',1)->orderBy('id','asc')->get();
        $pdf=PDF::loadView('clientes.clientespdfall',compact('clientes'));
         
        return $pdf->setPaper('a4','landscape')->stream('Clientes.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }
    public function clientegetone($id){
       
        $cliente= Cliente::find($id);
        $pdf=PDF::loadView('clientes.clientegetone',compact('cliente'));
         
        return $pdf->setPaper('a4','landscape')->stream('Cliente.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }

    public function novedadall(){
       
        $novedades= Novedad::where('eliminar','=',1)->orderBy('id','asc')->get();
        $pdf=PDF::loadView('novedads.novedadall',compact('novedades'));
         
        return $pdf->setPaper('a4','landscape')->stream('Novedades.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }
    public function novedadgetone($id){
       
        $novedad= Novedad::find($id);
        $pdf=PDF::loadView('novedads.novedadgetone',compact('novedad'));
         
        return $pdf->setPaper('a4','landscape')->stream('Novedad.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }

    public function soporteallfibra(){
       
        $informefibra= Soportefibra::all();
        $pdf=PDF::loadView('soportes.reportefibra',compact('informefibra'));
         
        return $pdf->setPaper('a4','landscape')->stream('Informefibra.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }

    public function soportegetonefibra($id){
       
        $informefibra= Soportefibra::find($id);
        $pdf=PDF::loadView('soportes.soportepdfgetoneefibra',compact('informefibra'));
         
        return $pdf->setPaper('a4','landscape')->stream('Informefibra.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }

    public function soporteallradio(){
       
        $informeradio= Soporteradio::all();
        $pdf=PDF::loadView('soportes.soporteallradio',compact('informeradio'));
         
        return $pdf->setPaper('a4','landscape')->stream('Informefibra.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }

    public function soporteallgetoneradio($id){
       
       
        $informeradio= Soporteradio::find($id);
       
        $pdf=PDF::loadView('soportes.soporteallgetoneradio',compact('informeradio'));
         
        return $pdf->setPaper('a4','landscape')->stream('InformeRadio.pdf'); // esto hace horizotal la hoja
        //return $pdf->stream('Clientes.pdf');
        // return $pdf->download('prueba.pdf');
    }
}

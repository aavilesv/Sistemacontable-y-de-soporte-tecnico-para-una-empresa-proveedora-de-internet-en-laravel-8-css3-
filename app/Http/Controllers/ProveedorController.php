<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    //

    public function proveedorlistar(){

       $clientes = Proveedor::orderBy('id','desc')->paginate(); 
    return view('proveedors.proveedorlistar',compact('clientes'));
    }

    
    public function ingresar(){

        //     $clientes = Proveedor::orderBy('id','desc')->paginate(); 
     //        return view('proveedor.proveedor',compact('clientes'));
         }
}

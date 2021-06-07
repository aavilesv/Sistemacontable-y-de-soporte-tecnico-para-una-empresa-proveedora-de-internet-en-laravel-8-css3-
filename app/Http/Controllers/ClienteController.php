<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCliente;
use App\Models\Cliente;
use App\Models\Cliente\Canton;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //
    public function clientelistar(){
        $clientes = Cliente::all();
        return view('clientes.clientelistar',compact('clientes'));
            
    
    }
    public function create(){
        $action="new";
        $cantons = Canton::all();
        return view('clientes.create',compact('cantons','action'));
    }
    public function ingresar(StoreCliente $request){
            try {
               $cliente=Cliente::Create($request->all());
                return redirect()->route('clientes.clientelistar');

            }catch(\Exception $exception){
                return  redirect()->back()->with('error',"Error".$exception->getMessage());
            }

           
    }
   
    
    public function editar(Cliente $cliente){
        
        
        return view('clientes.editar',compact('cliente'));
    }

   
    public function update(Request $request,Cliente $cliente){

        $request->validate([
            'nombre'=>'required','apellido'=>'required',
            'cedula'=>'required'
            ,'direccion'=>'required']);
        $cliente->nombre=$request->nombre;
        $cliente->cedula=$request->cedula;
        $cliente->direccion=$request->direccion;
        $cliente->save();
        //$cliente->update($request->all());
        return redirect()->route('clientes.clientelistar');
           //return redirect()->route('clientes.show',$cliente);
    }

    public function delete(Request $request)
    {
       
        $id = $request->get('id');
        $Cliente = Cliente::find($id);
        $Cliente->delete();
        return  redirect()->route('clientes.clientelistar');
        

    }
}

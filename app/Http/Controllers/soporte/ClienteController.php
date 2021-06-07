<?php

namespace App\Http\Controllers\soporte;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCliente;
use App\Models\Cliente;
use App\Models\Cliente\Canton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::where('eliminar', '=', 1)->get();
        $config = array();
        $config['center'] = '-2.1714613594917402, -79.46931796727694';
        $config['zoom'] = '16';
        $config['map_height'] = '500px';
        //        $config['scrollwheel'] =false;
        $config['onboundschanged'] = 'if (!centreGot) {
                var mapCentre = map.getCenter();
                marker_0.setOptions({
                    position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
                });
            }
            centreGot = true;';

        app('map')->initialize($config);

        $marker['position'] = '-2.1714613594917402, -79.46931796727694';
        $marker['infowindow_content'] = "Quantika";
        $marker['icon'] = 'http://maps.google.com/mapfiles/kml/paddle/grn-circle.png';
        //$marker =array(); //start and end point should be same
        app('map')->add_marker($marker);
        foreach ($clientes as $valor) {

            if ($valor->latitud and $valor->longitud) {
                $marker['position'] = $valor->latitud . "," . $valor->longitud;
                $marker['infowindow_content'] = $valor->nombre . " " . $valor->apellido;
                $marker['icon'] = 'http://maps.google.com/mapfiles/kml/paddle/grn-circle.png';
                //$marker =array(); //start and end point should be same
                app('map')->add_marker($marker);
            }
        }


        $map = app('map')->create_map();


        return view('clientes.index', compact('clientes', 'map'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //$clientes = Cliente::where('eliminar','=',1)->get();
        $action = "new";
        $cantons = Canton::all();
        return view('clientes.create', compact('cantons', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCliente $request)
    {

        try {

            
         
            //  $request->foto=$url;

            $cliente = Cliente::Create($request->all());
            if ($request->ffoto) {
                $image = $request->file('ffoto')->store('public/image');
                $url = Storage::url($image);
                $cliente->ffoto = $url;
            }
            if ($request->fcedula1) {
            
                $cedula1 = $request->file('fcedula1')->store('public/cedula1');
                $urll = Storage::url($cedula1);
                $cliente->fcedula1 = $urll;
            }
            if ($request->fcedula2) {
            
                $cedula2 = $request->file('fcedula2')->store('public/cedula2');
                $urlll = Storage::url($cedula2);
                $cliente->fcedula2 = $urlll;
            }
          
            $cliente->save();
            return redirect()->route('clientes.index');
        } catch (\Exception $exception) {
            return  redirect()->back()->with('error', "Error" . $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $action = "show";
        $cliente = Cliente::find($id);
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        $action = "edit";
        $cantons = Canton::all();
        return view('clientes.edit', compact('cliente', 'action', 'cantons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCliente $request, Cliente $cliente)
    {
        try {

            //Código de validación de datos
            DB::beginTransaction();



           // Storage::deleteDirectory($cliente->ffoto);


            //$cedula1=$request->file('fcedula1')->store('public/cedula1');
            //$urll=Storage::url($cedula1);
            //$cedula2=$request->file('fcedula2')->store('public/cedula2');
            //$urlll=Storage::url($cedula2);
            $cliente->update($request->all());
            if ($request->ffoto) {
                $cade = str_replace('storage', 'public', $cliente->ffoto);
                Storage::delete($cade);
                
                $image = $request->file('ffoto')->store('public/image');
                $url = Storage::url($image);
                $cliente->ffoto = $url;
            }
            if ($request->fcedula1) {
                $cade = str_replace('storage', 'public', $cliente->fcedula1);
                Storage::delete($cade);
                $image = $request->file('fcedula1')->store('public/cedula1');
                $url = Storage::url($image);
                $cliente->fcedula1 = $url;
            }
            if ($request->fcedula2) {
                $cade = str_replace('storage', 'public', $cliente->fcedula2);
                Storage::delete($cade);
                $image = $request->file('fcedula2')->store('public/cedula2');
                $url = Storage::url($image);
                $cliente->fcedula2 = $url;
            }

            // $cliente->fcedula1=$urll;
            //$cliente->fcedula2=$urlll;
            $cliente->save();
            DB::commit();
            return redirect()->route('clientes.index');
        } catch (\Exception $exception) {
            DB::rollback();
            return  redirect()->back()->with('error', "Error" . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $id = $request->get('id');
        $Cliente = Cliente::find($id);
        $Cliente->eliminar = 0;
        $Cliente->save();

        return  redirect()->route('clientes.index');
    }
}

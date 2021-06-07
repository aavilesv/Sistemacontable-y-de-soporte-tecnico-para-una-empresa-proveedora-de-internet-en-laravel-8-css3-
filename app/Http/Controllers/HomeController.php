<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    //

    public function __invoke(){
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


        return view('layouts.home', compact('clientes', 'map'));
    }
}


<?php

namespace App\Http\Controllers\soporte;

use App\Http\Controllers\Controller;
use App\Models\Soporte\Soporteradio;
use Illuminate\Http\Request;

class reporteradio extends Controller
{
    
    public function index()
    {
        $soportefibraradio = Soporteradio::all();
        return view('soportes.reporteradio',compact('soportefibraradio'));
    }

}

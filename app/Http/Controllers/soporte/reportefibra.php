<?php

namespace App\Http\Controllers\soporte;

use App\Http\Controllers\Controller;
use App\Models\Soporte\Soportefibra;
use Illuminate\Http\Request;

class reportefibra extends Controller
{
    
    public function index()
    {
        $fibra = Soportefibra::all();
        return view('soportes.informefibra',compact('fibra'));
    }

}

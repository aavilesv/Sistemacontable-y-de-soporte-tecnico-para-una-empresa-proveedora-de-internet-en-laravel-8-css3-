<?php

namespace App\Models;

use App\Models\Cliente\Canton;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
   // esto te ayuda que se envie 
    protected  $fillable= 
    [
       'nombre','apellido','cedula','fechanacimiento','direccion'
       ,'cdaorecinto','gps','contacto','contacto1','servicio','latitud','longitud'
        ,'email','canton_id','estado','eliminar'
    ];
    // aqui solo vas a poner valores como eliminar o estado// protegidos 
    //protected  $guarded= [];
    public function canton(){
        return $this->belongsTo(Canton::class);
    }

    
}

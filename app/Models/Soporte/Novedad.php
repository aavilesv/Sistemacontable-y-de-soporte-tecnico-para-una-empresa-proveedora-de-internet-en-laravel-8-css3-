<?php

namespace App\Models\Soporte;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    use HasFactory;
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    protected $casts = [
        'horainciar' => 'datetime:d-m-Y H:i',
        ];
        
}

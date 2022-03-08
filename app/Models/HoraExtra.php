<?php

namespace App\Models;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HoraExtra extends Model

{
    Protected $fillable = ['start','end','hora','minuto','empleado_id'];
    Protected $dates = ['start', 'end'];

    public function empleado()
    {
    	return $this->belongsTo(Empleado::class);
    }
    
    use HasFactory;
}

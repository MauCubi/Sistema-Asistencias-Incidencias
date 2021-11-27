<?php

namespace App\Models;

use App\Models\Empleado;
use App\Models\TipoAsistencia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asistencia extends Model
{

    Protected $fillable = ['title','start','end','hora','minuto','verify','empleado_id','tipoasistencia_id'];
    Protected $dates = ['start', 'end'];


    public function empleado()
    {
    	return $this->belongsTo(Empleado::class);
    }

    public function tipoasistencia()
    {
    	return $this->belongsTo(TipoAsistencia::class);
    }
    use HasFactory;
}

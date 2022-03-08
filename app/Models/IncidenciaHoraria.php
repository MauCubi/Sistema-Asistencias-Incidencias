<?php

namespace App\Models;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IncidenciaHoraria extends Model
{
    Protected $fillable = ['fecha','justificacion','descripcion','tipo'.'empleado_id'];

    public function empleado()
    {
    	return $this->belongsTo(Empleado::class);
    }

    use HasFactory;
}

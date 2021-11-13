<?php

namespace App\Models;

use App\Models\Puesto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empleado extends Model
{


    Protected $fillable = ['nombre','apellido','dni','direccion','telefono','email','puesto_id','alta','altafip'];


    public function puesto()
    {
    	return $this->belongsTo(Puesto::class);
    }
    use HasFactory;
}

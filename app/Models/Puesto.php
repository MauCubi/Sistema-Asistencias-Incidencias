<?php

namespace App\Models;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Puesto extends Model
{

    
    Protected $fillable = ['nombre','departamento_id'];


    public function departamento()
    {
    	return $this->belongsTo(Departamento::class);
    }

    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }
    use HasFactory;
}

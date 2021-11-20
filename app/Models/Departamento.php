<?php

namespace App\Models;

use App\Models\Puesto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departamento extends Model
{

    Protected $fillable = ['nombre','area_id'];


    public function area()
    {
    	return $this->belongsTo(Area::class);
    }

    public function puestos()
    {
        return $this->hasMany(Puesto::class);
    }
    use HasFactory;
}

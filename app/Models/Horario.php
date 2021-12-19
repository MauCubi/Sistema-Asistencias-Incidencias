<?php

namespace App\Models;

use App\Models\Jornada;
use App\Models\CategoriaHorario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Horario extends Model
{
    Protected $fillable = ['nombre','tolerancia','categoria_id'];

    public function jornadas()
    {
        return $this->hasMany(Jornada::class);
    }

    public function categoriahorario()
    {
        return $this->belongsTo(CategoriaHorario::class);
    }

    use HasFactory;
}

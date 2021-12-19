<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaHorario extends Model
{
    Protected $fillable = ['nombre'];

    public function horarios()
    {
        return $this->hasMany(Asistencia::class);
    }

    use HasFactory;
}

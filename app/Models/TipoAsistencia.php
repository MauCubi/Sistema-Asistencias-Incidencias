<?php

namespace App\Models;

use App\Models\Asistencia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoAsistencia extends Model
{

    Protected $fillable = ['nombre'];

    public function asistencia()
    {
        return $this->hasMany(Asistencia::class);
    }

    use HasFactory;
}

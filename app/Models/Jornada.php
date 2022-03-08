<?php

namespace App\Models;

use App\Models\Horario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jornada extends Model
{
    Protected $fillable = ['entrada','salida','periodo','horario_id','isLunes','isMartes','isMiercoles','isJueves','isViernes','isSabado','isDomingo'];

    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }

    use HasFactory;
}

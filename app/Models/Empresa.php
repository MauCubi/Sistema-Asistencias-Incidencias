<?php

namespace App\Models;

use App\Models\Area;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empresa extends Model
{
    Protected $fillable = ['cuit','nombre','contacto','telefono'];


    public function areas()
    {
        return $this->hasMany(Area::class);
    }

    use HasFactory;
}

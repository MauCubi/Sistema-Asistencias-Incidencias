<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoEvento extends Model
{

    Protected $fillable = ['nombre','general','descuento'];


    public function events()
    {
        return $this->hasMany(Event::class);
    }

    use HasFactory;
}

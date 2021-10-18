<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{

    
    Protected $fillable = ['nombre','departamento_id'];


    public function departamento()
    {
    	return $this->belongsTo(Departamento::class);
    }
    use HasFactory;
}

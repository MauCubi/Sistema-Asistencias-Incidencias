<?php

namespace App\Models;

use App\Models\Departamento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Area extends Model
{
    Protected $fillable = ['nombre','empresa_id'];


    public function empresa()
    {
    	return $this->belongsTo(Empresa::class);
    }

    public function departamentos()
    {
        return $this->hasMany(Departamento::class);
    }
    
    use HasFactory;



}



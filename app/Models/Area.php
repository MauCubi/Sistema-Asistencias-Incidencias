<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    Protected $fillable = ['nombre','empresa_id'];


    public function empresa()
    {
    	return $this->belongsTo(Empresa::class);
    }

    use HasFactory;



}



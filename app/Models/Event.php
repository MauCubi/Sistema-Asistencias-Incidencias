<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{


    Protected $fillable = ['title','description','start','end'];
    use HasFactory;
}

<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{


    Protected $fillable = ['title','description','start','end','user_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    use HasFactory;
}

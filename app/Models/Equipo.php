<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    public function jugadores(){
    	return $this->hasMany('App\Jugador');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    protected $table = 'jugadores';
    public function equipo(){
    	return $this->belongsTo('App\Models\Equipo');
    }
    public function posicion(){
    	return $this->belongsTo('App\Models\Posicion');
    }
}

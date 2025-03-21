<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    protected $table='ejercicios';
    protected $fillable = ['nombre', 'descripcion','grupoMuscular', 'dificultad'];

    public function EjerciciosRutinas(){
        return $this->hasMany(EjerciciosRutinas::class);
    }
}

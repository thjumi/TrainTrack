<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    protected $table='ejercicios';
    protected $fillable = ['nombre', 'descripcion','grupoMuscular', 'dificultad', 'entrenador_id'];

    public function ejerciciosRutinas(){
        return $this->hasMany(EjercicioRutina::class);
    }
}

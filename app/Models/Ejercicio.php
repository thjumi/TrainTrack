<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model

{
    protected $table = "ejercicios";
    protected $fillable = ["nombre", "descripcion", "grupo_muscular", "dificultad"];

    public function ejercicioRutina()
{
    return $this->hasMany(EjercicioRutina::class);
}
}

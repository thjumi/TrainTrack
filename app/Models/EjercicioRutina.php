<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EjercicioRutina extends Model

{
    protected $table = "ejercicio_rutina";
    protected $fillable = ["repeticiones", "series", "descansos", "ejercicio_id", "rutina_id"];

    public function ejercicio()
    {
        return $this->belongsTo(Ejercicio::class);
    }
    public function rutina()
    {
        return $this->belongsTo(Rutina::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EjerciciosRutinas extends Model
{
    protected $table='ejercicios_rutinas';
    protected $fillable = ['ejercicio_id','rutina_id','repeticiones', 'series','descanso'];

    public function ejercicios(){
        return $this->belongsTo(Ejercicio::class);
    }
    public function rutinas(){
        return $this->belongsTo(Rutina::class);
    }
}

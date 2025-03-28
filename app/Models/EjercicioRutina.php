<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EjercicioRutina extends Model
{
    protected $table='ejercicios_rutinas';
    protected $fillable = ['ejercicio_id','rutina_id','repeticiones', 'series','descansos'];

    public function ejercicio(){
        return $this->belongsTo(Ejercicio::class);
    }
    public function rutina(){
        return $this->belongsTo(Rutina::class);
    }
}

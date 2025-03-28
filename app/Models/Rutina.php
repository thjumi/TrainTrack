<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
    protected $table='rutinas';
    protected $fillable = ['user_id', 'nombre','fechaCreacion', 'descripcion'];

    public function EjerciciosRutinas(){
        return $this->hasMany(EjercicioRutina::class);
    }
    public function usuario(){
        return $this->belongsTo(User::class);
    }
}

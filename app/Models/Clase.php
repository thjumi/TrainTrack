<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Clase extends Model
{
    protected $table = "clases";
    protected $fillable = ['nombre', 'descripcion', 'horario', 'cupo_max'];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
    public function entrenador()
    {
        return $this->belongsTo(Entrenador::class);
    }
    public function administrador()
    {
        return $this->belongsTo(Administrador::class);
    }
}

  


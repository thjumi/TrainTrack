<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clases extends Model
{
    protected $table='clases';
    protected $filleable=['nombre','descripcion','horario','cupoMax','entrenador_id'];

    public function reservas(){ //relación con clases
        return $this->hasMany(Reservas::class);
    }

    public function administradores(){ //relación con clases
        return $this->belongsTo(Administradores::class);
    }

    public function entrenadores(){ //relación con clases
        return $this->belongsTo(Entrenadores::class);
    }
}

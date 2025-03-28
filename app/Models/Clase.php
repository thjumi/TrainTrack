<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $table = 'clases';
    protected $fillable = ['nombre', 'descripcion', 'horario', 'cupoMax', 'entrenador_id'];

    public function reservas()
    { //relación con clases
        return $this->hasMany(Reserva::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'administrador_id');
    }


    public function entrenador()
    {
        return $this->belongsTo(User::class, 'entrenador_id');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "us";
    protected $fillable = ["nombre", "email", "contraseña", "registro"];
    protected $dates = ['deleted_at']; //guardar fechas (para el metodo destroy)

    public function seguimientos()
    {
        return $this->hasMany(Seguimiento::class);
    }
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function rutina()
    {
        return $this->hasMany(Rutina::class);
    }
}


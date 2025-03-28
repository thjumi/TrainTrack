<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = ['name', 'email', 'password', 'fecha_registro', 'rol'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



    public function hasRol()
    {
        return $this->rol === 'rol';
    }

    // Relación con reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    // Relación con seguimientos
    public function seguimientos()
    {
        return $this->hasMany(Seguimiento::class);
    }

    // Relación con rutinas
    public function rutinas()
    {
        return $this->hasMany(Rutina::class);
    }

    // Relación con clases (entrenador)
    public function clases()
    {
        return $this->hasMany(Clase::class, 'entrenador_id');
    }
}

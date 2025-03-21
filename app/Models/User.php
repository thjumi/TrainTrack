<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = ['name', 'email', 'password', 'fechaRegistro', 'rol'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relación con reservas
    public function reservas()
    {
        return $this->hasMany(Reservas::class);
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

    // Relación con clases (si el usuario es entrenador)
    public function clases()
    {
        return $this->hasMany(Clases::class, 'entrenador_id');
    }
}

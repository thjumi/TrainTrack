<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
    protected $table = "rutinas";
    protected $fillable = ["nombre", "fecha", "descripcion", "user_id"];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function ejercicioRutina()
    {
        return $this->hasMany(EjercicioRutina::class);
    }
}

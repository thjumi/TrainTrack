<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrenadores extends Model
{
    protected $filleable =['nombre','email','telefono','especialidad'];

    public function clases(){ //relación con clases
        return $this->hasMany(Clases::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administradores extends Model
{
    protected $table= 'administradors';

    protected $filleable =['nombre','email','telefono','especialidad'];

    public function clases(){ //relación con clases
        return $this->hasMany(Clases::class);
    }
}

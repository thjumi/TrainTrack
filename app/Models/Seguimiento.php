<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    protected $table='seguimientos';
    protected $fillable = ['user_id', 'fecha', 'progreso', 'peso','altura', 'notas'];

    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

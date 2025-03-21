<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    protected $table='reservas';

    protected $fillable = ['clase_id', 'usuario_id', 'fechaReserva', 'confirmado'];

    public function clases(){
        return $this->belongsTo(Clases::class);
    }
    public function usuario(){
        return $this->belongsTo(User::class);
    }

}

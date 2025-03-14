<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = "reservas";
    protected $fillable = ["fecha_reserva", "estado", "user_id", "clase_id"];

    public function clase()
    {
        return $this->belongsTo(Clase::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function reserva()
    {
        return $this->belongsTo(user::class);
    }
}


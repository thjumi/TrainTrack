<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    protected $table = "seguimientos";
    protected $fillable = ["fecha", "progreso", "notas", "user_id"];

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}

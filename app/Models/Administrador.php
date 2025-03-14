<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Administrador extends Model
{
    protected $table = "administradores";
    protected $fillable = ['nombre', 'email', 'telefono', 'especialidad'];

    public function clases()
    {
        return $this->hasMany(Clase::class);
    }
}


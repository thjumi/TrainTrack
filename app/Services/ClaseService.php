<?php

namespace App\Services;

use App\Contracts\ClaseServiceInterface;
use App\Models\User;
use App\Models\Clase;

class ClaseService implements ClaseServiceInterface
{
    public function getAllClases($user)
{
    switch ($user->rol) {
        case 'administrador':
            return Clase::all();
        case 'entrenador':
            return Clase::where('entrenador_id', $user->id)->get();
        case 'usuario':
            return Clase::all();
        default:
            return Clase::all();
    }
}


    public function getClaseById($id)
    {
        return Clase::findOrFail($id);
    }

    public function createClase(array $data)
    {
        if (!User::where('id', $data['entrenador_id'])->where('rol', 'entrenador')->exists()) {
            throw new \InvalidArgumentException("El entrenador seleccionado no es válido.");
        }
        return Clase::create($data);
    }
    

    public function updateClase($id, array $data)
    {
        $clase = Clase::findOrFail($id);
        $clase->update($data);
        return $clase;
    }

    public function deleteClase($id)
    {
        $clase = Clase::findOrFail($id);
        $clase->delete();
    }
}



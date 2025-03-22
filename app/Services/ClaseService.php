<?php

namespace App\Services;

use App\Contracts\ClaseServiceInterface;
use App\Models\Clase;

class ClaseService implements ClaseServiceInterface
{
    public function getAllClases($user)
    {
        if ($user->rol === 'administrador') {
            return Clase::all();
        } elseif ($user->rol === 'entrenador') {
            return Clase::where('entrenador_id', $user->id)->get();
        }
        return Clase::all();
    }

    public function getClaseById($id)
    {
        return Clase::findOrFail($id);
    }

    public function createClase(array $data)
    {
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


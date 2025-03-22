<?php

namespace App\Services;

use App\Contracts\EjercicioServiceInterface;
use App\Models\Ejercicio;
use Illuminate\Support\Facades\Auth;

class EjercicioService implements EjercicioServiceInterface
{
    public function getAllEjercicios($user)
    {
        if ($user->rol === 'administrador') {
            return Ejercicio::all();
        } elseif ($user->rol === 'entrenador') {
            return Ejercicio::where('entrenador_id', $user->id)->get();
        }
        return Ejercicio::all();
    }

    public function createEjercicio(array $data)
    {
        return Ejercicio::create($data);
    }

    public function getEjercicioById($id)
    {
        return Ejercicio::findOrFail($id);
    }

    public function updateEjercicio($id, array $data, $user)
    {
        $ejercicio = $this->getEjercicioById($id);

        if ($user->rol !== 'administrador' && $ejercicio->entrenador_id !== $user->id) {
            abort(403, 'No tienes permiso para editar este ejercicio.');
        }

        $ejercicio->update($data);
        return $ejercicio;
    }

    public function deleteEjercicio($id, $user)
    {
        $ejercicio = $this->getEjercicioById($id);

        if ($user->rol !== 'administrador' && $ejercicio->entrenador_id !== $user->id) {
            abort(403, 'No tienes permiso para eliminar este ejercicio.');
        }

        $ejercicio->delete();
    }
}

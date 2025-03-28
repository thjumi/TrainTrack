<?php
namespace App\Services;

use App\Contracts\RutinaServiceInterface;
use App\Models\Rutina;

class RutinaService implements RutinaServiceInterface
{
    public function getAllRutinas($user)
    {
        return Rutina::where('user_id', $user->id)->get();
    }

    public function createRutina(array $data, $user)
    {
        return Rutina::create(array_merge($data, ['user_id' => $user->id]));
    }

    public function getRutinaById($id, $user)
    {
        $rutina = Rutina::findOrFail($id);

        if ($rutina->usuario_id !== $user->id) {
            abort(403, 'No tienes permiso para ver esta rutina.');
        }

        return $rutina;
    }

    public function updateRutina($id, array $data, $user)
    {
        $rutina = $this->getRutinaById($id, $user);

        $rutina->update($data);
        return $rutina;
    }

    public function deleteRutina($id, $user)
    {
        $rutina = $this->getRutinaById($id, $user);

        $rutina->delete();
    }
}

<?php

namespace App\Services;

use App\Contracts\SeguimientoServiceInterface;
use App\Models\Seguimiento;
use Illuminate\Support\Facades\Auth;

class SeguimientoService implements SeguimientoServiceInterface
{
    public function getAllSeguimientos($user)
    {
        if (in_array($user->rol, ['administrador', 'entrenador'])) {
            return Seguimiento::all();
        }
        return Seguimiento::where('usuario_id', $user->id)->get();
    }

    public function getSeguimientoById($id, $user)
    {
        $seguimiento = Seguimiento::findOrFail($id);
        if ($seguimiento->usuario_id !== $user->id && !in_array($user->rol, ['administrador', 'entrenador'])) {
            abort(403, 'No tienes permiso para ver este seguimiento.');
        }
        return $seguimiento;
    }

    public function createSeguimiento(array $data, $user)
    {
        return Seguimiento::create(array_merge($data, ['usuario_id' => $user->id]));
    }

    public function updateSeguimiento($id, array $data, $user)
    {
        $seguimiento = $this->getSeguimientoById($id, $user);
        $seguimiento->update($data);
        return $seguimiento;
    }

    public function deleteSeguimiento($id, $user)
    {
        $seguimiento = $this->getSeguimientoById($id, $user);
        $seguimiento->delete();
    }
}

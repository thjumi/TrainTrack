<?php
namespace App\Services;

use App\Contracts\ReservaServiceInterface;
use App\Models\Reserva;

class ReservaService implements ReservaServiceInterface
{
    public function getAllReservas($user)
    {
        if ($user->rol === 'administrador') {
            return Reserva::all();
        } elseif ($user->rol === 'user') {
            return Reserva::where('user_id', $user->id)->get();
        } elseif ($user->rol === 'entrenador') {
            return Reserva::where('entrenador_id', $user->id)->get();
        }
    }

    public function createReserva(array $data)
    {
        return Reserva::create($data);
    }

    public function getReservaById($id, $user)
    {
        $reserva = Reserva::findOrFail($id);

        if (($user->rol === 'user' && $reserva->user_id !== $user->id) ||
            ($user->rol === 'entrenador' && $reserva->entrenador_id !== $user->id)) {
            abort(403, 'No tienes permiso para ver esta reserva.');
        }

        return $reserva;
    }

    public function updateReserva($id, array $data, $user)
    {
        $reserva = $this->getReservaById($id, $user);

        if ($user->rol !== 'administrador') {
            abort(403, 'No tienes permiso para actualizar esta reserva.');
        }

        $reserva->update($data);
        return $reserva;
    }

    public function deleteReserva($id, $user)
    {
        $reserva = $this->getReservaById($id, $user);

        if ($user->rol !== 'administrador') {
            abort(403, 'No tienes permiso para eliminar esta reserva.');
        }

        $reserva->delete();
    }
}

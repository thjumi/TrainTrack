<?php

namespace App\Http\Controllers;

use App\Contracts\ReservaServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    protected $reservaService;

    public function __construct(ReservaServiceInterface $reservaService)
    {
        $this->reservaService = $reservaService;
    }

    public function index()
    {
        $user = Auth::user();
        $reservas = $this->reservaService->getAllReservas($user);

        return view('reservas.index', compact('reservas'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->rol !== 'user') {
            abort(403, 'No tienes permiso para crear una reserva.');
        }

        $request->validate([
            'clase_id' => 'required|exists:clases,id',
            'entrenador_id' => 'required|exists:entrenadores,id',
            'fechaReserva' => 'required|date|',
            'confirmado' => 'required|boolean',
        ]);

        $this->reservaService->createReserva($request->all());

        return redirect()->route('reservas.index')->with('success', 'Reserva creada exitosamente.');
    }

    public function show($id)
    {
        $user = Auth::user();
        $reserva = $this->reservaService->getReservaById($id, $user);

        return view('reservas.show', compact('reserva'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $request->validate([
            'clase_id' => 'required|exists:clases,id',
            'user_id' => 'required|exists:users,id',
            'fechaReserva' => 'required|date',
            'confirmado' => 'required|boolean',
        ]);

        $this->reservaService->updateReserva($id, $request->all(), $user);

        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $this->reservaService->deleteReserva($id, $user);

        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada exitosamente.');
    }
}

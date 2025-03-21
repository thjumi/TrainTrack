<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservas;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->rol === 'administrador') {
            $reservas = Reservas::all();
        } elseif ($user->rol === 'user') {
            $reservas = Reservas::where('user_id', $user->id)->get();
        } elseif ($user->rol === 'entrenador') {
            $reservas = Reservas::where('entrenador_id', $user->id)->get();
        }
        return view('reservas.index', compact('reservas'));

    }

    public function store(Request $request)
    {

        $user = Auth::user(); //Asegurar que solo el usuario pueda hacer reservas
        if ($user->rol === 'user') {
            return redirect()->route('reservas.index')->with('error', 'No tienes permiso para crear una reserva.');
        }
        $request->validate([
            'clase_id' => 'required|exists:clases,id',
            'entrenador_id' => 'required|exists:entrenadores,id',
            'fechaReserva' => 'required|date',
            'confirmado' => 'required|boolean',
        ]);

        Reservas::create($request->all()); // Crea una nueva clase
        return redirect()->route('reservas.index')->with('success', 'Reserva creada exitosamente');
    }

    public function show($id)
    {
        $user = Auth::user();
        $reserva = Reservas::findOrFail($id);
        //verificar que solo pueda ver sus reservas
        if ($user->rol === 'user' && $reserva->user_id !== $user->id) {
            abort(403, 'No tienes permiso para ver esta reserva.');
        }

        if ($user->rol === 'entrenador' && $reserva->entrenador_id !== $user->id) {
            abort(403, 'no tienes permiso para ver esta reserva');
        }

        $reservas = Reservas::findOrFail($id); // Busca la clase o lanza un error 404
        return view('reservas.show', compact('reservas')); // Muestra los detalles
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $reservas = Reservas::findOrFail($id);

        if ($user->rol==='administrador'&& $reservas->user_id !== $user->id){
            abort(403, 'No tienes permiso para actualizar esta reserva.');
        }

        $request->validate([
            'clase_id' => 'required|exists:clases,id',
            'user_id' => 'required|exists:users,id',
            'fechaReserva' => 'required|date',
            'confirmado' => 'required|boolean',
        ]);

        $reservas->update($request->all());
        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada exitosamente');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $reserva = Reservas::findOrFail($id);

        if ($user->rol !== 'administrador' && $reserva->user_id !== $user->id) {
            return response()->json(['error' => 'No tienes permiso para eliminar esta reserva'], 403);
        }

        $reserva->delete();
        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada exitosamente');
    }
}

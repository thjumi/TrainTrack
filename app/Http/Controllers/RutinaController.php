<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Rutina;
use Illuminate\Http\Request;

class RutinaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $rutinas = Rutina::where('usuario_id', $user->id)->get(); // Obtener solo las rutinas del usuario autenticado
        return view('rutinas.index', compact('rutinas'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nombre' => 'required|string|max:40',
            'fechaCreacion' => 'required|date',
            'descripcion' => 'required|string|max:200',
        ]);

        // Crear la rutina asociada al usuario autenticado
        Rutina::create([
            'usuario_id' => $user->id,
            'nombre' => $request->nombre,
            'fechaCreacion' => $request->fechaCreacion,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('rutinas.index')->with('success', 'Rutina creada exitosamente');
    }

    public function show($id)
    {
        $user = Auth::user();
        $rutina = Rutina::findOrFail($id);

        // Verificar que solo pueda ver sus propias rutinas
        if ($rutina->usuario_id !== $user->id) {
            abort(403, 'No tienes permiso para ver esta rutina.');
        }

        return view('rutinas.show', compact('rutina')); // Mostrar la rutina individual
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $rutina = Rutina::findOrFail($id);

        // Verificar que solo pueda actualizar sus propias rutinas
        if ($rutina->usuario_id !== $user->id) {
            abort(403, 'No tienes permiso para actualizar esta rutina.');
        }

        $request->validate([
            'nombre' => 'required|string|max:40',
            'fechaCreacion' => 'required|date',
            'descripcion' => 'required|string|max:200',
        ]);

        $rutina->update($request->only(['nombre', 'fechaCreacion', 'descripcion']));

        return redirect()->route('rutinas.index')->with('success', 'Rutina actualizada exitosamente');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $rutina = Rutina::findOrFail($id);

        // Verificar que solo pueda eliminar sus propias rutinas
        if ($rutina->usuario_id !== $user->id) {
            return response()->json(['error' => 'No tienes permiso para eliminar esta rutina'], 403);
        }

        $rutina->delete();

        return redirect()->route('rutinas.index')->with('success', 'Rutina eliminada exitosamente');
    }
    
}

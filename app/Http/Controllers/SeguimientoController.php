<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Seguimiento;
use Illuminate\Http\Request;

class SeguimientoController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // El administrador y el entrenador pueden ver todos los seguimientos
        if (in_array($user->rol, ['administrador', 'entrenador'])) {
            $seguimientos = Seguimiento::all();
        } else {
            // El usuario solo puede ver sus propios seguimientos
            $seguimientos = Seguimiento::where('usuario_id', $user->id)->get();
        }

        return view('seguimientos.index', compact('seguimientos'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $seguimiento = Seguimiento::findOrFail($id);

        // Administrador y entrenador pueden ver cualquier seguimiento, el usuario solo el suyo
        if ($seguimiento->usuario_id !== $user->id && !in_array($user->rol, ['administrador', 'entrenador'])) {
            abort(403, 'No tienes permiso para ver este seguimiento.');
        }

        return view('seguimientos.show', compact('seguimiento'));
    }

    public function create()
    {
        $user = Auth::user();

        // Solo los usuarios pueden crear seguimientos
        if ($user->rol !== 'usuario') {
            abort(403, 'No tienes permiso para crear seguimientos.');
        }

        return view('seguimientos.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        // Solo los usuarios pueden almacenar seguimientos
        if ($user->rol !== 'usuario') {
            abort(403, 'No tienes permiso para crear seguimientos.');
        }

        $request->validate([
            'fecha' => 'required|date',
            'altura' => 'required|numeric',
            'peso' => 'required|numeric',
            'progreso' => 'required|string|max:255',
            'notas' => 'nullable|string|max:500',
        ]);

        // Crear el seguimiento asociado al usuario autenticado
        Seguimiento::create([
            'usuario_id' => $user->id,
            'fecha' => $request->fecha,
            'altura' => $request->altura,
            'peso' => $request->peso,
            'progreso' => $request->progreso,
            'notas' => $request->notas,
        ]);

        return redirect()->route('seguimientos.index')->with('success', 'Seguimiento creado exitosamente.');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $seguimiento = Seguimiento::findOrFail($id);

        // Solo el usuario puede editar su propio seguimiento
        if ($seguimiento->usuario_id !== $user->id) {
            abort(403, 'No tienes permiso para editar este seguimiento.');
        }

        return view('seguimientos.edit', compact('seguimiento'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $seguimiento = Seguimiento::findOrFail($id);

        // Solo el usuario puede actualizar su propio seguimiento
        if ($seguimiento->usuario_id !== $user->id) {
            abort(403, 'No tienes permiso para actualizar este seguimiento.');
        }

        $request->validate([
            'fecha' => 'required|date',
            'altura' => 'required|numeric',
            'peso' => 'required|numeric',
            'progreso' => 'required|string|max:255',
            'notas' => 'nullable|string|max:500',
           
        ]);

        $seguimiento->update($request->all());

        return redirect()->route('seguimientos.index')->with('success', 'Seguimiento actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $seguimiento = Seguimiento::findOrFail($id);

        // Solo el usuario puede eliminar su propio seguimiento
        if ($seguimiento->usuario_id !== $user->id) {
            abort(403, 'No tienes permiso para eliminar este seguimiento.');
        }

        $seguimiento->delete();

        return redirect()->route('seguimientos.index')->with('success', 'Seguimiento eliminado exitosamente.');
    }
}

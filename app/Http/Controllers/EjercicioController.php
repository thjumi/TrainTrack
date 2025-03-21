<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Ejercicio;
use Illuminate\Http\Request;

class EjercicioController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->rol === 'administrador') {
            $ejercicios = Ejercicio::all();
        } elseif ($user->rol === 'entrenador') {
            $ejercicios = Ejercicio::where('entrenador_id', $user->id)->get();
        } else {
            $ejercicios = Ejercicio::all();
        }

        return view('ejercicios.index', compact('ejercicios'));
    }

    public function create()
    {
        // Solo el administrador y el entrenador pueden crear ejercicios
        $user = Auth::user();
        if (!in_array($user->rol, ['administrador', 'entrenador'])) {
            abort(403, 'No tienes permiso para crear ejercicios.');
        }

        return view('ejercicios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:25',
            'descripcion' => 'required|string|max:200',
            'grupoMuscular' => 'required|string|max:100',
            'dificultad' => 'required|string|max:50',
        ]);

        Ejercicio::create($request->all());
        return redirect()->route('ejercicios.index')->with('success', 'Ejercicio creado exitosamente');
    }

    public function show($id)
    {
        $ejercicio = Ejercicio::findOrFail($id);
        return view('ejercicios.show', compact('ejercicio'));
    }

    public function edit($id)
    {
        $ejercicio = Ejercicio::findOrFail($id);

        // Solo el administrador o el entrenador que lo creó pueden editar
        $user = Auth::user();
        if ($user->rol !== 'administrador' && $ejercicio->entrenador_id !== $user->id) {
            abort(403, 'No tienes permiso para editar este ejercicio.');
        }

        return view('ejercicios.edit', compact('ejercicio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:25',
            'descripcion' => 'required|string|max:200',
            'grupoMuscular' => 'required|string|max:100',
            'dificultad' => 'required|string|max:50',
        ]);

        $ejercicio = Ejercicio::findOrFail($id);
        $ejercicio->update($request->all());
        return redirect()->route('ejercicios.index')->with('success', 'Ejercicio actualizado exitosamente');
    }

    public function destroy($id)
    {
        $ejercicio = Ejercicio::findOrFail($id);
        $ejercicio->delete();
        return redirect()->route('ejercicios.index')->with('success', 'Ejercicio eliminado exitosamente');
    }
}


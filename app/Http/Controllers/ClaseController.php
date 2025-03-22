<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Clase;
use Illuminate\Http\Request;

class ClaseController extends Controller
{
    public function index()
{
    $user = auth::user();

    if ($user->rol === 'administrador') {
        $clases = Clase::all();
    } elseif ($user->rol === 'entrenador') {
        $clases = Clase::where('entrenador_id', $user->id)->get();
    } else {
        $clases = Clase::all(); // Los usuarios ven todas las clases disponibles
    }

    return $clases;
}


    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:25',
            'descripcion' => 'required|string|max:200',
            'horario' => 'required|date',
            'entrenador_id' => 'required|exists:entrenadores,id',
            'cupoMax' => 'required|integer|min:1', // Validación como número entero positivo
        ]);

        Clase::create($request->all()); // Crea una nueva clase
        return redirect()->route('clases.index')->with('success', 'Clase creada exitosamente');
    }

    public function show($id) {
        $clase = Clase::findOrFail($id); // Busca la clase o lanza un error 404
        return view('clases.show', compact('clase')); // Muestra los detalles
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'horario' => 'required|date',
            'entrenador_id' => 'required|exists:entrenadores,id',
            'cupoMax' => 'required|integer|min:1', // Validación como número entero positivo
        ]);

        $clase = Clase::findOrFail($id); // Busca la clase
        $clase->update($request->all()); // Actualiza los datos
        return redirect()->route('clases.index')->with('success', 'Clase actualizada exitosamente');
    }

    public function destroy($id) {
        $clase = Clase::findOrFail($id); // Busca la clase
        $clase->delete(); // La elimina
        return redirect()->route('clases.index')->with('success', 'Clase eliminada exitosamente');
    }
}

<?php
namespace App\Http\Controllers;

use App\Contracts\EjercicioServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EjercicioController extends Controller
{
    protected $ejercicioService;

    public function __construct(EjercicioServiceInterface $ejercicioService)
    {
        $this->ejercicioService = $ejercicioService;
    }

    public function index()
    {
        $user = Auth::user();
        $ejercicios = $this->ejercicioService->getAllEjercicios($user);

        return view('ejercicios.index', compact('ejercicios'));
    }

    public function create()
    {
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

        $this->ejercicioService->createEjercicio($request->all());

        return redirect()->route('ejercicios.index')->with('success', 'Ejercicio creado exitosamente.');
    }

    public function show($id)
    {
        $ejercicio = $this->ejercicioService->getEjercicioById($id);

        return view('ejercicios.show', compact('ejercicio'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $ejercicio = $this->ejercicioService->getEjercicioById($id);

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

        $user = Auth::user();
        $this->ejercicioService->updateEjercicio($id, $request->all(), $user);

        return redirect()->route('ejercicios.index')->with('success', 'Ejercicio actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $this->ejercicioService->deleteEjercicio($id, $user);

        return redirect()->route('ejercicios.index')->with('success', 'Ejercicio eliminado exitosamente.');
    }
}

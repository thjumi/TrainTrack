<?php
namespace App\Http\Controllers;

use App\Contracts\RutinaServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RutinaController extends Controller
{
    protected $rutinaService;

    public function __construct(RutinaServiceInterface $rutinaService)
    {
        $this->rutinaService = $rutinaService;
    }

    public function index()
    {
        $user = Auth::user();
        $rutinas = $this->rutinaService->getAllRutinas($user);

        return view('rutinas.index', compact('rutinas'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nombre' => 'required|string|min:10|max:40',
            'fechaCreacion' => 'required|date',
            'descripcion' => 'required|string|max:200',
        ]);

        $this->rutinaService->createRutina($request->all(), $user);

        return redirect()->route('rutinas.index')->with('success', 'Rutina creada exitosamente.');
    }

    public function show($id)
    {
        $user = Auth::user();
        $rutina = $this->rutinaService->getRutinaById($id, $user);

        return view('rutinas.show', compact('rutina'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $request->validate([
            'nombre' => 'required|string|min:10|max:40',
            'fechaCreacion' => 'required|date',
            'descripcion' => 'required|string|max:200',
        ]);

        $this->rutinaService->updateRutina($id, $request->all(), $user);

        return redirect()->route('rutinas.index')->with('success', 'Rutina actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $this->rutinaService->deleteRutina($id, $user);

        return redirect()->route('rutinas.index')->with('success', 'Rutina eliminada exitosamente.');
    }
}

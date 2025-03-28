<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Contracts\SeguimientoServiceInterface;

class SeguimientoController extends Controller
{
    protected $seguimientoService;

    public function __construct(SeguimientoServiceInterface $seguimientoService)
    {
        $this->seguimientoService = $seguimientoService;
    }

    public function index()
    {
        $user = Auth::user();
        $seguimientos = $this->seguimientoService->getAllSeguimientos($user);

        return view('seguimientos.index', compact('seguimientos'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $seguimiento = $this->seguimientoService->getSeguimientoById($id, $user);

        return view('seguimientos.show', compact('seguimiento'));
    }

    public function create()
    {
        $user = Auth::user();

        if ($user->rol !== 'usuario') {
            abort(403, 'No tienes permiso para crear seguimientos.');
        }

        return view('seguimientos.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'fecha' => 'required|date',
            'altura' => 'required|numeric',
            'peso' => 'required|numeric',
            'progreso' => 'required|numeric',
            'notas' => 'nullable|string|max:500',
        ]);

        $this->seguimientoService->createSeguimiento($request->all(), $user);

        return redirect()->route('seguimientos.index')->with('success', 'Seguimiento creado exitosamente.');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $seguimiento = $this->seguimientoService->getSeguimientoById($id, $user);

        return view('seguimientos.edit', compact('seguimiento'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $request->validate([
            'fecha' => 'required|date',
            'altura' => 'required|numeric',
            'peso' => 'required|numeric',
            'progreso' => 'required|string|max:255',
            'notas' => 'nullable|string|max:500',
        ]);

        $this->seguimientoService->updateSeguimiento($id, $request->all(), $user);

        return redirect()->route('seguimientos.index')->with('success', 'Seguimiento actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $this->seguimientoService->deleteSeguimiento($id, $user);

        return redirect()->route('seguimientos.index')->with('success', 'Seguimiento eliminado exitosamente.');
    }
}


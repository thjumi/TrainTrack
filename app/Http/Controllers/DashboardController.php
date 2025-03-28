<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        switch ($user->rol) {
            case 'administrador':
                return view('dashboard.admin', compact('user'));
            case 'entrenador':
                return view('dashboard.entrenador', compact('user'));
            case 'usuario':
                return view('dashboard.usuario', compact('user'));
            default:
                abort(403, 'Rol no permitido.');
        }
    }
}

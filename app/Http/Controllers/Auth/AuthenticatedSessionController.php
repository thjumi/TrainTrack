<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate(); // Autentica al usuario con las credenciales proporcionadas
        $request->session()->regenerate(); // Regenera el token de sesión por seguridad

        // Redirige según el rol del usuario
        return $this->authenticated($request, Auth::user());
    }

    /**
     * Redirige al dashboard correspondiente según el rol del usuario autenticado.
     */
    protected function authenticated(Request $request, $user)
    {
        switch ($user->rol) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'entrenador':
                return redirect()->route('entrenador.dashboard');
            case 'user':
                return redirect()->route('user.dashboard');
            default:
                abort(403, 'Acceso no autorizado');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

<?php

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\RutinaController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Dashboard específico para usuarios (rol usuario)
Route::middleware(['auth', 'rol:usuario'])->group(function () {
    Route::get('/dashboard/usuario', [DashboardController::class, 'usuarioDashboard'])
        ->name('usuario.dashboard');
});

Route::middleware(['auth', 'rol:entrenador'])->group(function () {
    Route::get('/dashboard/entrenador', [DashboardController::class, 'entrenadorDashboard'])
        ->name('entrenador.dashboard');
});

Route::middleware(['auth', 'rol:administrador'])->group(function () {
    Route::get('/dashboard/admin', [DashboardController::class, 'adminDashboard'])
         ->name('admin.dashboard');
});

Route::middleware(['auth', 'rol:administrador'])->group(function () {
    Route::resource('users', UserController::class);
});


// Rutas de autenticación
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::middleware('guest')->group(function () {
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

// Rutas públicas
Route::get('/', function () {
    return view('welcome');
});

// Dashboard general (redirige según rol)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Rutas protegidas (usuarios autenticados)
Route::middleware('auth')->group(function () {

    // Rutas de perfil
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Rutas generales para cualquier rol
    Route::get('/clases', [ClaseController::class, 'index'])->name('clases.index');
    Route::get('/clases/{id}', [ClaseController::class, 'show'])->name('clases.show');

    Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');
    Route::get('/reservas/{id}', [ReservaController::class, 'show'])->name('reservas.show');

    Route::get('/seguimientos', [SeguimientoController::class, 'index'])->name('seguimientos.index');
    Route::get('/seguimientos/{id}', [SeguimientoController::class, 'show'])->name('seguimientos.show');

    Route::get('/ejercicios', [EjercicioController::class, 'index'])->name('ejercicios.index');
    Route::get('/ejercicios/{id}', [EjercicioController::class, 'show'])->name('ejercicios.show');

    // Rutas específicas para usuarios (rol: usuario)
    Route::middleware('rol:usuario')->group(function () {
        // Reservas: 
        Route::get('/reservas/create', [ReservaController::class, 'create'])->name('reservas.create');
        Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
        Route::get('/reservas/{id}/edit', [ReservaController::class, 'edit'])->name('reservas.edit');
        Route::put('/reservas/{id}', [ReservaController::class, 'update'])->name('reservas.update');
        Route::delete('/reservas/{id}', [ReservaController::class, 'destroy'])->name('reservas.destroy');

        // Rutinas:
        Route::prefix('rutinas')->group(function () {
            Route::get('/create', [RutinaController::class, 'create'])->name('rutinas.create');
            Route::get('/', [RutinaController::class, 'index'])->name('rutinas.index');
            Route::post('/', [RutinaController::class, 'store'])->name('rutinas.store');
            Route::get('/{id}', [RutinaController::class, 'show'])->name('rutinas.show');
            Route::get('/{id}/edit', [RutinaController::class, 'edit'])->name('rutinas.edit');
            Route::put('/{id}', [RutinaController::class, 'update'])->name('rutinas.update');
            Route::delete('/{id}', [RutinaController::class, 'destroy'])->name('rutinas.destroy');
        });

        // Seguimientos:
        Route::prefix('seguimientos')->group(function () {
            Route::get('/create', [SeguimientoController::class, 'create'])->name('seguimientos.create');
            Route::post('/', [SeguimientoController::class, 'store'])->name('seguimientos.store');
            Route::get('/{id}/edit', [SeguimientoController::class, 'edit'])->name('seguimientos.edit');
            Route::put('/{id}', [SeguimientoController::class, 'update'])->name('seguimientos.update');
            Route::delete('/{id}', [SeguimientoController::class, 'destroy'])->name('seguimientos.destroy');
        });
    });

    // Rutas exclusivas para el administrador
    Route::middleware('rol:administrador')->group(function () {
        // Clases:
        Route::get('/clases/create', [ClaseController::class, 'create'])->name('clases.create');
        Route::post('/clases', [ClaseController::class, 'store'])->name('clases.store');
        Route::get('/clases/{id}/edit', [ClaseController::class, 'edit'])->name('clases.edit');
        Route::put('/clases/{id}', [ClaseController::class, 'update'])->name('clases.update');
        Route::delete('/clases/{id}', [ClaseController::class, 'destroy'])->name('clases.destroy');

        // Reservas:
        Route::put('/reservas/{id}', [ReservaController::class, 'update'])->name('reservas.update');
        Route::delete('/reservas/{id}', [ReservaController::class, 'destroy'])->name('reservas.destroy');
    });

    // Rutas exclusivas para el administrador y entrenador
    Route::middleware('rol:administrador|entrenador')->group(function () {
        // Ejercicios:
        Route::get('/ejercicios/create', [EjercicioController::class, 'create'])->name('ejercicios.create');
        Route::post('/ejercicios', [EjercicioController::class, 'store'])->name('ejercicios.store');
        Route::get('/ejercicios/{id}/edit', [EjercicioController::class, 'edit'])->name('ejercicios.edit');
        Route::put('/ejercicios/{id}', [EjercicioController::class, 'update'])->name('ejercicios.update');
        Route::delete('/ejercicios/{id}', [EjercicioController::class, 'destroy'])->name('ejercicios.destroy');
    });
});

require __DIR__.'/auth.php';

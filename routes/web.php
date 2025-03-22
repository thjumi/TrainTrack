<?php

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\RutinaController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\EjercicioController;

// Rutas de autenticación
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Rutas de registro y recuperación de contraseña
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::middleware('guest')->group(function () {
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

// Rutas de inicio y dashboard
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas (solo usuarios autenticados)
Route::middleware('auth')->group(function () {

    // Rutas de perfil
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Rutas de acceso general (todos los roles)
    Route::get('/clases', [ClaseController::class, 'index'])->name('clases.index');
    Route::get('/clases/{id}', [ClaseController::class, 'show'])->name('clases.show');
    Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');
    Route::get('/reservas/{id}', [ReservaController::class, 'show'])->name('reservas.show');
    Route::get('/seguimientos', [SeguimientoController::class, 'index'])->name('seguimientos.index');
    Route::get('/seguimientos/{id}', [SeguimientoController::class, 'show'])->name('seguimientos.show');
    Route::get('/ejercicios', [EjercicioController::class, 'index'])->name('ejercicios.index');
    Route::get('/ejercicios/{id}', [EjercicioController::class, 'show'])->name('ejercicios.show');

    // Rutas específicas para usuarios (CRUD de reservas, rutinas y seguimientos)
    Route::middleware('role:usuario')->group(function () {
        Route::prefix('reservas')->group(function () {
            Route::post('/', [ReservaController::class, 'store'])->name('reservas.store');
        });

        Route::prefix('rutinas')->group(function () {
            Route::get('/', [RutinaController::class, 'index'])->name('rutinas.index');
            Route::post('/', [RutinaController::class, 'store'])->name('rutinas.store');
            Route::get('/{id}', [RutinaController::class, 'show'])->name('rutinas.show');
            Route::put('/{id}', [RutinaController::class, 'update'])->name('rutinas.update');
            Route::delete('/{id}', [RutinaController::class, 'destroy'])->name('rutinas.destroy');
        });

        Route::prefix('seguimientos')->group(function () {
            Route::post('/', [SeguimientoController::class, 'store'])->name('seguimientos.store');
            Route::get('/{id}/edit', [SeguimientoController::class, 'edit'])->name('seguimientos.edit');
            Route::put('/{id}', [SeguimientoController::class, 'update'])->name('seguimientos.update');
            Route::delete('/{id}', [SeguimientoController::class, 'destroy'])->name('seguimientos.destroy');
        });
    });

    // Rutas exclusivamente para el administrador
    Route::middleware('role:administrador')->group(function () {
        Route::prefix('clases')->group(function () {
            Route::post('/', [ClaseController::class, 'store'])->name('clases.store');
            Route::put('/{id}', [ClaseController::class, 'update'])->name('clases.update');
            Route::delete('/{id}', [ClaseController::class, 'destroy'])->name('clases.destroy');
        });

        Route::prefix('reservas')->group(function () {
            Route::put('/{id}', [ReservaController::class, 'update'])->name('reservas.update');
            Route::delete('/{id}', [ReservaController::class, 'destroy'])->name('reservas.destroy');
        });
    });

    // Rutas exclusivamente para el administrador y entrenador
    Route::middleware('role:administrador|entrenador')->group(function () {
        Route::prefix('ejercicios')->group(function () {
            Route::post('/', [EjercicioController::class, 'store'])->name('ejercicios.store');
            Route::put('/{id}', [EjercicioController::class, 'update'])->name('ejercicios.update');
            Route::delete('/{id}', [EjercicioController::class, 'destroy'])->name('ejercicios.destroy');
        });
    });

});

require __DIR__.'/auth.php';

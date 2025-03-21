<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\RutinaController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\EjercicioController;

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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para todos los roles (administrador, entrenador, usuario)
    Route::get('/clases', [ClaseController::class, 'index'])->name('clases.index');
    Route::get('/clases/{id}', [ClaseController::class, 'show'])->name('clases.show');
    Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');
    Route::get('/reservas/{id}', [ReservaController::class, 'show'])->name('reservas.show');
    Route::get('/seguimientos', [SeguimientoController::class, 'index'])->name('seguimientos.index');
    Route::get('/seguimientos/{id}', [SeguimientoController::class, 'show'])->name('seguimientos.show');
    Route::get('/ejercicios', [EjercicioController::class, 'index'])->name('ejercicios.index');
    Route::get('/ejercicios/{id}', [EjercicioController::class, 'show'])->name('ejercicios.show');

    // Rutas solo para usuarios (crear, actualizar y eliminar rutinas y reservas)
    Route::middleware(['role:usuario'])->group(function () {
        // Reservas
        Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');

        // Rutinas
        Route::get('/rutinas', [RutinaController::class, 'index'])->name('rutinas.index');
        Route::post('/rutinas', [RutinaController::class, 'store'])->name('rutinas.store');
        Route::get('/rutinas/{id}', [RutinaController::class, 'show'])->name('rutinas.show');
        Route::put('/rutinas/{id}', [RutinaController::class, 'update'])->name('rutinas.update');
        Route::delete('/rutinas/{id}', [RutinaController::class, 'destroy'])->name('rutinas.destroy');

        // Seguimientos
        Route::post('/seguimientos', [SeguimientoController::class, 'store'])->name('seguimientos.store');
        Route::get('/seguimientos/{id}/edit', [SeguimientoController::class, 'edit'])->name('seguimientos.edit');
        Route::put('/seguimientos/{id}', [SeguimientoController::class, 'update'])->name('seguimientos.update');
        Route::delete('/seguimientos/{id}', [SeguimientoController::class, 'destroy'])->name('seguimientos.destroy');
    });

    // Rutas exclusivamente para el administrador
    Route::middleware(['role:administrador'])->group(function () {
        // CRUD de clases
        Route::post('/clases', [ClaseController::class, 'store'])->name('clases.store');
        Route::put('/clases/{id}', [ClaseController::class, 'update'])->name('clases.update');
        Route::delete('/clases/{id}', [ClaseController::class, 'destroy'])->name('clases.destroy');

        // CRUD de reservas
        Route::put('/reservas/{id}', [ReservaController::class, 'update'])->name('reservas.update');
        Route::delete('/reservas/{id}', [ReservaController::class, 'destroy'])->name('reservas.destroy');
    });

    // Rutas exclusivamente para el administrador y entrenador
    Route::middleware(['role:administrador|entrenador'])->group(function () {
        
        // CRUD de ejercicios
        Route::post('/ejercicios', [EjercicioController::class, 'store'])->name('ejercicios.store');
        Route::put('/ejercicios/{id}', [EjercicioController::class, 'update'])->name('ejercicios.update');
        Route::delete('/ejercicios/{id}', [EjercicioController::class, 'destroy'])->name('ejercicios.destroy');
    });
});

require __DIR__.'/auth.php';

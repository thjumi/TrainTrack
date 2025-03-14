<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;


Route::get('/', function () {
    return view('welcome');
});

// Ruta del Dashboard (protegida por autenticación)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas de perfil (protegidas por autenticación)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas para la autenticación (login, registro, etc.)
require __DIR__ . '/auth.php';

// Rutas para el restablecimiento de la contraseña (solo para usuarios no autenticados)
Route::middleware('guest')->group(function () {
    // Ruta para mostrar el formulario de "Olvidé mi contraseña"
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    // Ruta para enviar el enlace de restablecimiento de contraseña
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    // Ruta para mostrar el formulario de restablecimiento de contraseña con el token
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    // Ruta para procesar el restablecimiento de la contraseña
    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
    Route::get('/test-mail', function () {
        // Envía un correo de prueba
        Mail::raw('Este es un correo de prueba enviado desde Laravel', function ($message) {
            $message->to('tu-email@gmail.com')  // Cambia esto por tu dirección de correo electrónico
                ->subject('Correo de prueba');
        });

        return '¡Correo de prueba enviado!';
    });
});

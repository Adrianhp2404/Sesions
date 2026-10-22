<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Ruta principal (Home) - Protegida o disponible según prefieras, aquí apunta al login o home
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

// Autenticación (Login)
Route::post('/login', [AuthController::class, 'login']);

// Registro de usuarios
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Home (Página protegida o principal tras loguearse)
Route::get('/home', function () {
    return view('home');
})->name('home');

// Cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
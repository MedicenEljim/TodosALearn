<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ProfesoresController;
use App\Http\Controllers\AulasController;
use App\Http\Controllers\ProfesoresAulasController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('Login.Index');
});

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/crear-cuenta', [LoginController::class, 'crearCuenta'])->name('crearCuenta');
Route::post('/crear-cuenta', [LoginController::class, 'storeCuenta'])->name('storeCuenta');

// Rutas para el controlador de recursos
Route::resource('inicio', InicioController::class);
Route::resource('profesores', ProfesoresController::class);
Route::resource('aulas', AulasController::class);
Route::resource('profesoresaulas', ProfesoresAulasController::class);

Route::get('/inicio', [InicioController::class, 'index'])->name('inicio.index');

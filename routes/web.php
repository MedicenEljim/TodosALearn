<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ProfesoresController;
use App\Http\Controllers\AulasController;
use App\Http\Controllers\ProfesoresAulasController;

Route::get('/', function () {
    return view('layouts.app');
});


Route::resource('inicio', InicioController::class);
Route::resource('profesores', ProfesoresController::class);
Route::resource('aulas', AulasController::class);
Route::resource('profesoresaulas', ProfesoresAulasController::class);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\PersonaDomicilioController;
use App\Http\Controllers\LoginController;
use App\Models\PersonaDomicilio;

Route::get('/', function () {
    return view('welcome');
})->name('.welcome');

Route::get('registro', [LoginController::class, 'showRegistro'])->name('registro.showRegistro');

Route::post('registro', [LoginController::class, 'store'])->name('registro.store');

Route::post('login', [LoginController::class, 'login']);


Route::resource('personas', PersonaController::class);
Route::resource('personas.domicilios', PersonaDomicilioController::class);


Route::get('personas.search', [PersonaController::class, 'search'])->name('personas.search');

Route::put('personas.{persona}', [PersonaController::class, 'activated'])->name('personas.activated');





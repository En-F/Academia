<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\NotaController;
use App\Models\nota;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::livewire('/editar-nota-alumno', 'pages::editarnota.index')->name('editarnota.index');
Route::post('/gestion-notas/actualizar', [NotaController::class, 'actualizar'])->name('notas.actualizar');
Route::get('/asignatura/aprobados', [NotaController::class, 'aprobados'])->name('asignaturas.aprobados');
Route::get('/notas/ver/{id}', [NotaController::class, 'ver'])->name('notas.ver');
Route::get('/notas/cambiar/{id}', [NotaController::class, 'cambiar'])->name('notas.cambiar');

Route::resource('alumnos',AlumnoController::class);
Route::resource('notas',NotaController::class);

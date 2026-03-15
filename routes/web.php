<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\NotaController;
use App\Models\nota;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('alumnos',AlumnoController::class)
    ->middleware('auth');

Route::resource('alumnos', AlumnoController::class)
    ->only(['index']);

    Route::resource('notas',NotaController::class);


Route::post('/gestion-notas/actualizar', [NotaController::class, 'actualizar'])->name('notas.actualizar');
Route::get('/asignatura/aprobados', [NotaController::class, 'aprobados'])->name('asignaturas.aprobados');


Route::middleware('auth')->group(function () {
    
    //El usuario tiene que estar autenticado para poder hacer ciertas cosas
    
    Route::get('/notas/ver/{id}', [NotaController::class, 'ver'])->name('notas.ver');
    
    Route::get('/notas/cambiar/{id}', [NotaController::class, 'cambiar'])->name('notas.cambiar');

    //Livewire controlador aparte
    Route::livewire('/editar-nota-alumno', 'pages::editarnota.index')->name('editarnota.index');
    
    Route::post('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});


Route::get('/login', function () {
    return view('user.login');
})->name('login');


Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended(route('alumnos.index'));
    }

    return back()->withErrors([
        'email' => 'Las credenciales no coinciden con nuestros registros.',
    ])->onlyInput('email');
})->name('login.perform');
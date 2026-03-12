<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = alumno::paginate(10);
        return view('alumnos.index',[
            'alumnos'=>$alumnos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(alumno $alumno)
    {
        return view('alumnos.show',[
            'alumno'=>$alumno
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(alumno $alumno)
    {
        return view('alumnos.edit',['alumno'=>$alumno]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, alumno $alumno)
    {
        $datos = $request->validate([
        'nombre'=>'required|max:255',
        'telefono'=>'required|max:255']);

        $alumno->update($datos);

        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(alumno $alumno)
    {
        if($alumno->notas()->exists()) {
            return back();
        }
        $alumno->delete();
        return redirect()
            ->route('alumnos.index');
    }
}

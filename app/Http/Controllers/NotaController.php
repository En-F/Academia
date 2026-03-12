<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use App\Models\nota;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(nota $nota ,alumno $alumno)
    {
        return view('notas.show',[
            'alumno'=>$alumno,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(nota $nota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, nota $nota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(nota $nota)
    {
        //
    }


    public function ver(Request $request ,$id)
    {

        $alumno = DB::table('alumnos')->where('id',$id)->first();
        
        $notas = DB::table('notas')
        ->join('alumnos','notas.alumno_id','=','alumnos.id')
        ->join( 'evaluaciones','notas.evaluacion_id','=','evaluaciones.id')
        ->join('asignaturas','notas.asignatura_id','=','asignaturas.id')
        ->select('notas.nota', 'evaluaciones.evaluacion', 'asignaturas.denominacion','asignaturas.id as asignatura_id')
        ->where('alumno_id','=',$id)
        ->get();
        
        $cabeceras = DB::table('evaluaciones')->pluck('evaluacion');

        return view('notas.ver',[
            'alumno'=>$alumno,
            'notas'=>$notas,
            'cabeceras'=>$cabeceras
        ]);
    }

    public function cambiar(Request $request ,$id)
    {
        $alumno = DB::table('alumnos')->where('id',$id)->first();
        $asignaturas = DB::table('asignaturas')->get();
        $evaluaciones = DB::table('evaluaciones')->get();        $evaluaciones = DB::table('evaluaciones')->get();

        return view('notas.cambiar',[
            'alumno'=>$alumno,
            'asignaturas' => $asignaturas,
            'evaluaciones' => $evaluaciones,])
        ;
    }

    public function actualizar(Request $request)
    {
        $alumno = $request->input('alumno_id');
        $asignatura = $request->input('asignatura_id');
        $evaluacion = $request->input('evaluacion_id');
        $nuevaNota = $request->input('nota');

        DB::table('notas')->insert([
            'alumno_id'     => $alumno,
            'asignatura_id' => $asignatura,
            'evaluacion_id' => $evaluacion,
            'nota'          => $nuevaNota
        ]);

        return redirect()->route('notas.ver', $alumno)->with('status', 'Nota actualizada correctamente');
    }

   public function aprobados(Request $request)
   {
    
        $id= $request->query('id');
        $asignatura = DB::table('asignaturas')->where('id',$id)->first();

        $aprobado = DB::table('alumnos')
                    ->join('notas','alumnos.id','=','notas.alumno_id')
                    ->where('notas.asignatura_id','=',$id)
                    ->groupBy('alumnos.id','alumnos.nombre')
                    ->havingRaw('AVG(notas.nota)>= 5')
                    ->orderBy('promedio','desc')
                    ->select('alumnos.nombre',DB::raw('ROUND(AVG(notas.nota), 2) as promedio'))
                    ->get();

        return view('asignaturas.aprobados',
        ['asignatura'=>$asignatura,
                'aprobado'=>$aprobado]);
    }

}

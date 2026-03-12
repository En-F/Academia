<?php

namespace Database\Seeders;

use App\Models\User;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $carlos = DB::table('alumnos')->insertGetId(['nombre' => 'Carlos Rodríguez', 'telefono' => '600111222']);
        $ana = DB::table('alumnos')->insertGetId(['nombre' => 'Ana Belén García', 'telefono' => '611222333']);
        $juan = DB::table('alumnos')->insertGetId(['nombre' => 'Juan José Ortiz', 'telefono' => '622333444']);
        $lucia = DB::table('alumnos')->insertGetId(['nombre' => 'Lucía Méndez', 'telefono' => '622333444']);
        $sergio = DB::table('alumnos')->insertGetId(['nombre' => 'Sergio Peña', 'telefono' => '644555666']);
        $elena = DB::table('alumnos')->insertGetId(['nombre' => 'Elena Vázquez', 'telefono' => '655666777']);
        $marcos = DB::table('alumnos')->insertGetId(['nombre' => 'Marcos Torres', 'telefono' => '666777888']);
        $sofia = DB::table('alumnos')->insertGetId(['nombre' => 'Sofía Delgado', 'telefono' => '666777888']);
        $diego = DB::table('alumnos')->insertGetId(['nombre' => 'Diego Romero', 'telefono' => '688999000']);
        $paula = DB::table('alumnos')->insertGetId(['nombre' => 'Paula Castro', 'telefono' => '699000111']);
        $adrian = DB::table('alumnos')->insertGetId(['nombre' => 'Adrián Gil', 'telefono' => '711222333']);
        $marta = DB::table('alumnos')->insertGetId(['nombre' => 'Marta Sanz', 'telefono' => '722333444']);

        $lengua = DB::table('asignaturas')->insertGetId(['codigo' => '#Le', 'denominacion' => 'Lengua y Literatura']);
        $ingles = DB::table('asignaturas')->insertGetId(['codigo' => '#In', 'denominacion' => 'Inglés']);
        $historia = DB::table('asignaturas')->insertGetId(['codigo' => '#Hi', 'denominacion' => 'Historia']);

        $primera_evaluacion = DB::table('evaluaciones')->insertGetId(['evaluacion' => 'Primera']);
        $segunda_evaluacion = DB::table('evaluaciones')->insertGetId(['evaluacion' => 'Segunda']);
        $tercera_evaluacion = DB::table('evaluaciones')->insertGetId(['evaluacion' => 'Tercera']);
        $ordinaria = DB::table('evaluaciones')->insertGetId(['evaluacion' => 'Ordinaria']);
        $extraordinaria = DB::table('evaluaciones')->insertGetId(['evaluacion' => 'Extraordinaria']);

        DB::table('notas')->insert([
            ['alumno_id' => $carlos, 'asignatura_id' => $lengua, 'evaluacion_id' => $segunda_evaluacion, 'nota' => 5],
            ['alumno_id' => $carlos, 'asignatura_id' => $lengua, 'evaluacion_id' => $tercera_evaluacion, 'nota' => 7],
            ['alumno_id' => $carlos, 'asignatura_id' => $lengua, 'evaluacion_id' => $tercera_evaluacion, 'nota' => 2.3],
             ['alumno_id' => $carlos, 'asignatura_id' => $lengua, 'evaluacion_id' => $segunda_evaluacion, 'nota' => 7.3],

            ['alumno_id' => $carlos, 'asignatura_id' => $historia, 'evaluacion_id' => $ordinaria, 'nota' => 6],
            ['alumno_id' => $carlos, 'asignatura_id' => $historia, 'evaluacion_id' => $segunda_evaluacion, 'nota' => 5],
            ['alumno_id' => $carlos, 'asignatura_id' => $historia, 'evaluacion_id' => $tercera_evaluacion, 'nota' => 7],
            ['alumno_id' => $carlos, 'asignatura_id' => $historia, 'evaluacion_id' => $ordinaria, 'nota' => 6],
            
            ['alumno_id' => $ana, 'asignatura_id' => $ingles, 'evaluacion_id' => $primera_evaluacion, 'nota' => 8],
            ['alumno_id' => $ana, 'asignatura_id' => $ingles, 'evaluacion_id' => $segunda_evaluacion, 'nota' => 9],
            
            ['alumno_id' => $juan, 'asignatura_id' => $historia, 'evaluacion_id' => $primera_evaluacion, 'nota' => 4],
            ['alumno_id' => $juan, 'asignatura_id' => $historia, 'evaluacion_id' => $extraordinaria, 'nota' => 5],
            
            ['alumno_id' => $lucia, 'asignatura_id' => $lengua, 'evaluacion_id' => $primera_evaluacion, 'nota' => 10],
            ['alumno_id' => $lucia, 'asignatura_id' => $ingles, 'evaluacion_id' => $primera_evaluacion, 'nota' => 9],
            
            ['alumno_id' => $sergio, 'asignatura_id' => $historia, 'evaluacion_id' => $segunda_evaluacion, 'nota' => 3],
            ['alumno_id' => $sergio, 'asignatura_id' => $historia, 'evaluacion_id' => $ordinaria, 'nota' => 2],
        ]);
    }
}

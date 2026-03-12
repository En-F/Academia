<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nota extends Model
{
    protected $fillable = ['alumno_id,evaluacion_id,asignatura_id'];

    public function alumno(){
        return $this->belongsTo(alumno::class);
    }
    
    public function asignatura(){
        return $this->belongsTo(alumno::class);
    }

    public function evaluacion(){
        return $this->belongsTo(alumno::class);
    }
}

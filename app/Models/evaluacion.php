<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class evaluacion extends Model
{
    protected $table = 'evaluaciones';

    protected $fillable = ['evaluacion'];


    public function notas(){
        return $this->hasMany(nota::class);
    }
}

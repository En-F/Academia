<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class asignatura extends Model
{
    protected $fillable = ['codigo,denominacion'];

    public function notas(){
        return $this->hasMany(nota::class);
    }
}

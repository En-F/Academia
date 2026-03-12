<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{
    protected $fillable = ['nombre','telefono'];

    public function notas(){
        return $this->hasMany(nota::class);
    }
}

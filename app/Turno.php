<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $fillable = ['designacao'];

    public function turmas()
    {
        return $this->hasMany('App\Turma');
    }
}

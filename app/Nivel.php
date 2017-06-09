<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model

{

    protected $fillable = ['designacao'];
    public function turmas()
    {
        return $this->hasMany('App\Turma');
    }
}

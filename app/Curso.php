<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
        protected $fillable = ['designacao'];


        public function turmas()
    {
        return $this->hasMany('App\Turma');
    }

}

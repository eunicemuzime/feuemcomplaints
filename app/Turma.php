<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
        protected $fillable = ['designacao'];

        public function nivel(){

			return $this->belongsTo('\App\Nivel');
	}

	public function curso(){

			return $this->belongsTo('\App\Curso');
	}

	public function turno(){

			return $this->belongsTo('\App\Turno');
	}

}

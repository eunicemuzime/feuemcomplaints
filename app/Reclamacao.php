<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamacao extends Model
{
   protected $fillable = ['tipo','descricao','propostaSolucao','data','estado','reclamante','solucao'];

   public function turma(){

			return $this->belongsTo('\App\Turma');
	}

	public function categoria(){
	  	return $this->belongsTo('\App\Categoria');
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamacao extends Model
{
   protected $fillable = ['tipo','descricao','propostaSolucao','data','estado','reclamante'];

   public function departamento(){

			return $this->belongsTo('\App\Departamento');
	}

	public function categoriaReclamacao(){
	  	return $this->belongsTo('\App\CategoriaReclamacao');
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sugestao extends Model
{
    protected $fillable = ['tipo','categoria','descricao','data','estado','contribuinte'];

 public function turma(){

			return $this->belongsTo('\App\Turma');
	}

	public function categoria(){
	  	return $this->belongsTo('\App\Categoria');
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sugestao extends Model
{
    protected $fillable = ['tipo','categoria','descricao','data','estado','contribuinte'];

   public function departamento(){

			return $this->belongsTo('\App\Departamento');
	}

	public function categoriaSugestao(){
	  	return $this->belongsTo('\App\CategoriaSugestao');
	}
}

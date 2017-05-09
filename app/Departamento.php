<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //
    protected $fillable = ['designacao','sigla'];

     public function reclamacao(){

			return $this->hasMany('\App\Reclamacao');
	}
	
	public function sugestao(){

    			return $this->hasMany('\App\Sugestao');
    	}
}

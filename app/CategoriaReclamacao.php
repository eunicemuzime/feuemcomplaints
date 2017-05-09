<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaReclamacao extends Model
{
        protected $fillable = ['designacao'];


    public function reclamacao(){

			return $this->hasMany('\App\Reclamacao');
	}
}

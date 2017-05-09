<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaSugestao extends Model
{
            protected $fillable = ['designacao'];


        public function sugestao(){

    			return $this->hasMany('\App\Sugestao');
    	}
}

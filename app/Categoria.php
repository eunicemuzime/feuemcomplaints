<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['tipo','designacao'];


    public function reclamacaos()
    {
        return $this->hasMany('App\Reclamacao');
    }

    public function sugestaos()
    {
        return $this->hasMany('App\Sugestao');
    }

}

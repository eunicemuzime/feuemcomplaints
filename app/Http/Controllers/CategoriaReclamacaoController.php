<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaReclamacaoController extends Controller
{
  public function all()
	{

		$CategoriaReclamacao = \App\CategoriaReclamacao::all();
		return $CategoriaReclamacao;
	}
}

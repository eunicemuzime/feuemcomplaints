<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaSugestaoController extends Controller
{
     public function all()
	{

		$CategoriaSugestao = \App\CategoriaSugestao::all();
		return $CategoriaSugestao;
	}
}

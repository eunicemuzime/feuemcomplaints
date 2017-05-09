<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\CategoriaSugestao;
use App\Sugestao;
class SugestaoController extends Controller
{

	public function store(Request $request) {

    	$date = new \DateTime();
    	$date->format('Y-m-d H:i:s');
        $departamento =Departamento::find($request->input('departamento_id'))->first()->id;
        $categoria=CategoriaSugestao::find($request->input('categoria_id'))->first()->id;
        

        $sugestao = new Sugestao;
        $sugestao->tipo=$request->input('tipo');
        $sugestao->descricao=$request->input('descricao');
        $sugestao->estado="pendente";
        $sugestao->contribuinte=$request->input('contribuinte');
        $sugestao->data=$date;    
        $sugestao->departamento()->associate($departamento);
        $sugestao->categoriaSugestao()->associate($categoria);   
        $sugestao->save();

        return 'Sugestao record successfully created with id ' . $sugestao->id;


    }
   


    public function all()
    {
        $sugestao = \App\Sugestao::all();
        return $sugestao;
    }
}

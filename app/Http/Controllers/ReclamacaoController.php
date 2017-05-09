<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reclamacao;
use App\Departamento;
use App\CategoriaReclamacao;

class ReclamacaoController extends Controller
{   //Registar reclamacao
    public function store(Request $request) {

    	$date = new \DateTime();
    	$date->format('Y-m-d H:i:s');
        $categoria=CategoriaReclamacao::find($request->input('categoria_id'))->first()->id;
        $departamento =Departamento::find($request->input('departamento_id'))->first()->id;
        

        $reclamacao = new Reclamacao;
        $reclamacao->tipo=$request->input('tipo');
        $reclamacao->descricao=$request->input('descricao');
        $reclamacao->propostaSolucao=$request->input('propostaSolucao');
        $reclamacao->estado="pendente";
        $reclamacao->reclamante=$request->input('reclamante');
        $reclamacao->data=$date;    
        $reclamacao->departamento()->associate($departamento);
        $reclamacao->categoriaReclamacao()->associate($categoria);   
        $reclamacao->save();

        return 'Reclamacao record successfully created with id ' . $reclamacao->id;


    }
    //retornar todas as reclmacoes
    public function all()
    {

        $reclamacao = \App\Reclamacao::all();
        return $reclamacao;
    }
    //retornar reclamacoes pendentes
    public function reclamacoesPendenctes()
    {

        $reclamacao = \App\Reclamacao::all();
        return $reclamacao;
    }
}

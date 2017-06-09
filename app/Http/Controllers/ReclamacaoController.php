<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reclamacao;
use App\Categoria;
use App\Turno;
use App\Curso;
use App\Nivel;
use App\Turma;

class ReclamacaoController extends Controller
{
    
    public function store(Request $request) {

    	$date = new \DateTime();
    	$date->format('Y-m-d H:i:s');
        $categoria=Categoria::find($request->input('categoria_id'))->first()->id; 
        $turno=Turno::find($request->input('turno_id'))->first()->id;
        $curso=Curso::find($request->input('curso_id'))->first()->id;
        $nivel=Nivel::find($request->input('nivel_id'))->first()->id;
        $turma=Turma::where('turno_id','=',$turno)->where('curso_id','=',$curso)
        ->where('nivel_id','=',$nivel)->first()->id;
        

        

        $reclamacao = new Reclamacao;
        $reclamacao->tipo=$request->input('tipo');
        $reclamacao->descricao=$request->input('descricao');
        $reclamacao->propostaSolucao=$request->input('propostaSolucao');
        $reclamacao->estado="pendente";
        $reclamacao->reclamante=$request->input('reclamante');
        $reclamacao->data=$date;    
        $reclamacao->categoria()->associate($categoria); 
         $reclamacao->turma()->associate($turma);     
        $reclamacao->save();

       return 'Reclamação registada com sucesso!';


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



<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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

    public function update(Request $request,$id) {

        $data=$request->all();    

        $reclamacao = Reclamacao::find($id);
        $reclamacao->update($data);
        

       return $reclamacao;


    }
    

    //retornar todas as reclmacoes
    public function all()
    {

        $reclamacao = \App\Reclamacao::all();
        return $reclamacao;
    }
    //retornar reclamacoes pendentes
    public function reclamacoesPendentes()
    {
        $reclamacao =DB::table('reclamacaos as r')
            ->join('categorias as c', 'r.categoria_id', '=', 'c.id')
            ->join('turmas as t', 'r.turma_id', '=', 't.id')
            ->select('r.id as id','r.tipo as tipo', 'r.descricao as descricao', 'r.propostaSolucao as propostaSolucao', 'r.estado as estado', 'r.reclamante as reclamante', 'r.data as data', 'c.designacao as categoria', 't.designacao as turma')->where('estado','=','pendente')
             ->get();

            return $reclamacao;
    }
    
        public function reclamacoesCategoria()
    {

           $reclamacao =DB::table('reclamacaos as r')
            ->join('categorias as c', 'r.categoria_id', '=', 'c.id')
            ->select('c.designacao as categoria', DB::raw('count(*) as total'))
            ->groupBy('categoria')
             ->get();
             return $reclamacao;
    }

    public function reclamacoesValidas()
    {
        $reclamacao =DB::table('reclamacaos as r')
            ->join('categorias as c', 'r.categoria_id', '=', 'c.id')
            ->join('turmas as t', 'r.turma_id', '=', 't.id')
            ->select('r.id as id','r.tipo as tipo', 'r.descricao as descricao', 'r.propostaSolucao as propostaSolucao', 'r.estado as estado', 'r.reclamante as reclamante', 'r.data as data', 'c.designacao as categoria', 't.designacao as turma')
             ->where('estado','=','valida')
             ->get();

            return $reclamacao;
    }
    public function reclamacoesInvalidas()
    {

       $reclamacao =DB::table('reclamacaos as r')
            ->join('categorias as c', 'r.categoria_id', '=', 'c.id')
            ->join('turmas as t', 'r.turma_id', '=', 't.id')
            ->select('r.id as id','r.tipo as tipo', 'r.descricao as descricao', 'r.propostaSolucao as propostaSolucao', 'r.estado as estado', 'r.reclamante as reclamante', 'r.data as data', 'c.designacao as categoria', 't.designacao as turma')
             ->where('estado','=','invalida')
             ->get();

            return $reclamacao;
    }

    public function reclamacoesEmAtendimento()
    {

        $reclamacao =DB::table('reclamacaos as r')
            ->join('categorias as c', 'r.categoria_id', '=', 'c.id')
            ->join('turmas as t', 'r.turma_id', '=', 't.id')
            ->select('r.id as id','r.tipo as tipo', 'r.descricao as descricao', 'r.propostaSolucao as propostaSolucao', 'r.estado as estado', 'r.reclamante as reclamante', 'r.data as data', 'c.designacao as categoria', 't.designacao as turma')
             ->where('estado','=','em atendimento')
             ->get();

            return $reclamacao;
}
    public function reclamacoesSolucionadas()
    {

        $reclamacao =DB::table('reclamacaos as r')
            ->join('categorias as c', 'r.categoria_id', '=', 'c.id')
            ->join('turmas as t', 'r.turma_id', '=', 't.id')
            ->select('r.id as id','r.tipo as tipo', 'r.descricao as descricao', 'r.propostaSolucao as propostaSolucao', 'r.estado as estado', 'r.reclamante as reclamante', 'r.data as data', 'r.solucao as solucao','c.designacao as categoria', 't.designacao as turma')
             ->where('estado','=','solucionada')
             ->get();

            return $reclamacao;
    }

    public function reclamacoesNaoSolucionadas()
    {

       $reclamacao =DB::table('reclamacaos as r')
            ->join('categorias as c', 'r.categoria_id', '=', 'c.id')
            ->join('turmas as t', 'r.turma_id', '=', 't.id')
            ->select('r.id as id','r.tipo as tipo', 'r.descricao as descricao', 'r.propostaSolucao as propostaSolucao', 'r.estado as estado', 'r.reclamante as reclamante', 'r.data as data', 'r.solucao as solucao','c.designacao as categoria', 't.designacao as turma')
             ->where('estado','=','nao solucionada')
             ->get();

            return $reclamacao;
    }
}



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Turma;
use \App\Turno;
use \App\Curso;
use \App\Nivel;
class TurmaController extends Controller
{
    
      public function registar(Request $request)
    {
        $turno=Turno::find($request->input('turno_id'))->first()->id;
        $curso=Curso::find($request->input('curso_id'))->first()->id;
        $nivel=Nivel::find($request->input('nivel_id'))->first()->id;



        $turma = new Turma;
        $turma->designacao=$request->input('designacao');        
        $turma->turno()->associate($turno);
        $turma->curso()->associate($curso);
        $turma->nivel()->associate($nivel);    
        $turma->save();

        return 'Turma registada com sucesso!';
    }
     public function all()
    {
        $turmas = \App\Turma::all();
        return $turmas;
    }

     public function niveis()
    {
        $nivel = \App\Nivel::all();
        return $nivel;
    }

     public function turnos()
    {
        $turnos = \App\Turno::all();
        return $turnos;
    }

     public function cursos()
    {
        $cursos = \App\Curso::all();
        return $cursos;
    }
}

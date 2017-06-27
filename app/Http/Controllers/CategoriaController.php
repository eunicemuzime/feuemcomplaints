<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Categoria;

class CategoriaController extends Controller
{
      public function registar(Request $request)
    {
        
        $categoria = new Categoria;
        $categoria->designacao=$request->input('designacao'); 
         $categoria->tipo=$request->input('tipo');        
        $categoria->save();

        return 'Categoria registada com sucesso!';
    }
     public function all()
    {
        $categorias = \App\Categoria::orderBy('designacao', 'asc')->get();
        return $categorias;
    }

     public function reclamacoes()
    {
        $reclamacoes = \App\Categoria::where('tipo','=','reclamacao')->get();
        return $reclamacoes;
    }
}

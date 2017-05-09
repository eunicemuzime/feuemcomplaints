<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;

class DepartamentoController extends Controller
{
   public function store(Request $request) {
        $departamento = new Departamento;
        $departamento->designacao=$request->input('designacao');
        $departamento->sigla=$request->input('sigla');
        $departamento->save();

        return 'Departamento record successfully created with id ' . $departamento->id;
    }

    public function all()
	{

		$estudante = Departamento::all();
		return $estudante;
	}
}

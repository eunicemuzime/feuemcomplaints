<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
// header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/departamentos', 'DepartamentoController@store');
Route::get('/departamentos', 'DepartamentoController@all');




Route::post('/reclamacoes', 'ReclamacaoController@store');
Route::get('/reclamacoes', 'ReclamacaoController@all');
Route::put('/reclamacoes/{id}', 'ReclamacaoController@update');
Route::get('/reclamacoes/pendentes', 'ReclamacaoController@reclamacoesPendentes');
Route::get('/reclamacoes/validas', 'ReclamacaoController@reclamacoesValidas');
Route::get('/reclamacoes/invalidas', 'ReclamacaoController@reclamacoesInvalidas');
Route::get('/reclamacoes/em-atendimento', 'ReclamacaoController@reclamacoesEmAtendimento');
Route::get('/reclamacoes/solucionadas', 'ReclamacaoController@reclamacoesSolucionadas');
Route::get('/reclamacoes/nao-solucionadas', 'ReclamacaoController@reclamacoesNaoSolucionadas');
Route::get('/reclamacoes/por-categoria', 'ReclamacaoController@reclamacoesCategoria');
Route::get('/reclamacoes/por-estado', 'ReclamacaoController@reclamacoesEstado');
Route::get('/reclamacoes/por-tipo', 'ReclamacaoController@reclamacoesTipo');
Route::get('/reclamacoes/por-nivel', 'ReclamacaoController@reclamacoesNivel');




Route::post('/sugestoes', 'SugestaoController@store');
Route::get('/sugestoes', 'SugestaoController@reclamacoesPendentes');



Route::post('/categorias', 'CategoriaController@registar');
Route::get('/categorias', 'CategoriaController@all');
Route::get('/categorias/reclamacao', 'CategoriaController@reclamacoes');


//Turma
Route::post('/turmas', 'TurmaController@registar');
Route::get('/turmas', 'TurmaController@all');

Route::get('/niveis', 'TurmaController@niveis');
Route::get('/turnos', 'TurmaController@turnos');
Route::get('/cursos', 'TurmaController@cursos');

Route::post('/authenticate', 'AuthenticateController@authenticate');
Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
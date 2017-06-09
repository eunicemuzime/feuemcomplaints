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
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/departamentos', 'DepartamentoController@store');
Route::get('/departamentos', 'DepartamentoController@all');




Route::post('/reclamacoes', 'ReclamacaoController@store');
Route::get('/reclamacoes', 'ReclamacaoController@all');



Route::post('/sugestoes', 'SugestaoController@store');
Route::get('/sugestoes', 'SugestaoController@all');



Route::post('/categorias', 'CategoriaController@registar');
Route::get('/categorias', 'CategoriaController@all');
Route::get('/categorias/reclamacao', 'CategoriaController@reclamacoes');


//Turma
Route::post('/turmas', 'TurmaController@registar');
Route::get('/turmas', 'TurmaController@all');

Route::get('/niveis', 'TurmaController@niveis');
Route::get('/turnos', 'TurmaController@turnos');
Route::get('/cursos', 'TurmaController@cursos');

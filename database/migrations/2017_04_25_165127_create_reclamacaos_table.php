<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReclamacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->string('descricao');
            $table->string('propostaSolucao')->nullable();
            $table->string('estado');
            $table->string('reclamante');
            $table->date('data');
             $table->integer('categoria_id')->unsigned();
             $table->integer('turma_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('turma_id')->references('id')->on('turmas')->onDelete('cascade'); 


           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reclamacaos');
    }
}

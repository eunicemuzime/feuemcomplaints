<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSugestaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sugestaos', function (Blueprint $table) {
            $table->string('tipo');
            $table->string('descricao');
            $table->string('estado');
            $table->string('contribuinte');
            $table->date('data');
            $table->integer('categoria_sugestao_id')->unsigned();
            $table->integer('departamento_id')->unsigned();
            $table->foreign('categoria_sugestao_id')->references('id')->on('categoria_sugestaos')->onDelete('cascade');
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
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
        Schema::dropIfExists('sugestaos');
    }
}

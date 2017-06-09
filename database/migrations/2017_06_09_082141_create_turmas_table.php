<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->increments('id');
             $table->string('designacao');
             $table->integer('nivel_id')->unsigned();
             $table->integer('curso_id')->unsigned();
             $table->integer('turno_id')->unsigned();
             $table->timestamps();
             $table->foreign('nivel_id')->references('id')->on('nivels')->onDelete('cascade');
              $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
               $table->foreign('turno_id')->references('id')->on('turnos')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turmas');
    }
}

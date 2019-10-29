<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBoletinsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('arquivo');
            $table->integer('escola')->unsigned();
            $table->integer('turma')->unsigned();
            $table->integer('aluno')->unsigned();
            $table->string('mensagem');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('escola')->references('id')->on('escolas');
            $table->foreign('turma')->references('id')->on('turmas');
            $table->foreign('aluno')->references('id')->on('alunos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('boletins');
    }
}

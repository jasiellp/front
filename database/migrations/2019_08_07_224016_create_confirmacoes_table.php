<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfirmacoesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirmacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('responsavel')->unsigned();
            $table->integer('lancamento')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('responsavel')->references('id')->on('responsaveis');
            $table->foreign('lancamento')->references('id')->on('lancamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('confirmacoes');
    }
}

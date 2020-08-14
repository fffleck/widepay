<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRetornos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retornos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('url_id')->unsigned();
            $table->string('cod_retorno');
            $table->text('retorno');
            $table->date('dt_consulta')->nullable();
            $table->timestamps();
            $table->foreign('url_id')->references('id')->on('urls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

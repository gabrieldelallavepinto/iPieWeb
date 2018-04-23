<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCliente')->unsigned();
            $table->integer('idTipo')->unsigned();
            $table->integer('idClinica')->unsigned();
            $table->dateTime('fecha');
            $table->timestamps();
        });

        Schema::table('citas', function (Blueprint $table) {
            $table->foreign('idCliente')->references('id')->on('clientes');
            $table->foreign('idTipo')->references('id')->on('tipo_citas');
            $table->foreign('idClinica')->references('id')->on('clinicas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}

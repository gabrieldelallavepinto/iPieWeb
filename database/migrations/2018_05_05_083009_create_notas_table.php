<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('notas', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('idUsuario')->unsigned();
          $table->text('descripcion');
          $table->dateTime('fecha');
          $table->timestamps();
      });

      Schema::table('notas', function (Blueprint $table) {
        $table->foreign('idUsuario')->references('id')->on('users');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
  

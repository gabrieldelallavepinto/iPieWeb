<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNotasIdClinica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('notas', function (Blueprint $table) {
          $table->integer('idClinica')->unsigned();
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
      Schema::table('notas', function (Blueprint $table) {
          $table->dropColumn(['idClinica']);
      });
    }
}

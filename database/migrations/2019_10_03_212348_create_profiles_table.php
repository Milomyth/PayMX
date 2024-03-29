<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('profiles', function (Blueprint $table){
        $table->bigIncrements('id');
        $table->unsignedBigInteger('user_id');
        $table->string('direccion');
        $table->string('telefono');
        $table->string('empresa');
        $table->string('puesto');
        $table->enum('status', ['Bueno', 'Regular', 'Malo'])->default('Bueno');

        $table->foreign('user_id')
          ->references('id')
          ->on('users')
          ->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 50);
            $table->string('sobrenome', 50)->nullable();
            $table->string('email', 50)->unique();
            $table->string('senha');
            $table->string('image')->nullable();
            $table->string('sobre', 30)->nullable();
            $table->string('insta')->nullable();;
            $table->string('face')->nullable();;
            $table->string('twitter')->nullable();;
            $table->string('linkdin')->nullable();;
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
        Schema::dropIfExists('usuarios');
    }
}

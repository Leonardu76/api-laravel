<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postagems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cat')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->string('titulo', 50);
            $table->string('autor', 20);
            $table->text('conteudo');
            $table->string('image')->nullable();
            $table->timestamps();



        });
        Schema::table('postagems', function(Blueprint $table)
        {
            $table->foreign('id_cat')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }
   
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postagems');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonTable extends Migration
{
    public function up()
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('hp');
            $table->float('weight');
            $table->float('height');
            $table->string('image')->nullable(); 
            $table->unsignedBigInteger('type1_id');
            $table->unsignedBigInteger('type2_id')->nullable();
            $table->foreign('type1_id')->references('id')->on('types');
            $table->foreign('type2_id')->references('id')->on('types');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pokemon');
    }
}

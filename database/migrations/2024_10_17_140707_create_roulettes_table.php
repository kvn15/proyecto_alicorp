<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoulettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roulettes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->text('fondo')->nullable();
            $table->text('titulo_inicio')->nullable();
            $table->text('logo_inicio')->nullable();
            $table->text('titulo_juego')->nullable();
            $table->text('logo_juego')->nullable();
            $table->text('elementos_juego')->nullable();
            $table->text('titulo_premio')->nullable();
            $table->text('boton_premio')->nullable();
            $table->text('bloque_premios')->nullable();
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
        Schema::dropIfExists('roulettes');
    }
}

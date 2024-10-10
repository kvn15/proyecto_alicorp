<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->text('encabezado');
            $table->text('pagina_principal');
            $table->text('como_participar');
            $table->text('formulario_participar');
            $table->text('ganadores');
            $table->text('preguntas_frecuentes');
            $table->text('redes_sociales')->nullable();
            $table->text('html_preview');
            $table->text('html_origin');
            $table->text('html_end');
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
        Schema::dropIfExists('landings');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->boolean('terminos_condiciones')->default(false);
            $table->string('codigo')->nullable();
            $table->boolean('codigo_valido')->default(false);
            $table->unsignedBigInteger('award_project_id')->nullable();
            $table->foreign('award_project_id')->references('id')->on('award_projects');
            $table->dateTime('fecha_premio', $precision = 0)->nullable();
            $table->integer('punto_entrega')->nullable();
            $table->boolean('ganador')->default(false);
            $table->integer('participaciones');
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
        Schema::dropIfExists('participants');
    }
}

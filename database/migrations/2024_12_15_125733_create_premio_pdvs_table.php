<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremioPdvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premio_pdvs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asignacion_project_id')->nullable();
            $table->foreign('asignacion_project_id')->references('id')->on('asignacion_projects')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('award_project_id')->nullable();
            $table->foreign('award_project_id')->references('id')->on('award_projects')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('qty_premio')->nullable();
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
        Schema::dropIfExists('premio_pdvs');
    }
}

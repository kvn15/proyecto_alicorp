<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion_projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->unsignedBigInteger('xplorer_id')->nullable();
            $table->foreign('xplorer_id')->references('id')->on('xplorers');
            $table->date('fecha_inicio', $precision = 0)->nullable();
            $table->date('fecha_fin', $precision = 0)->nullable();
            $table->unsignedBigInteger('sales_point_id')->nullable();
            $table->foreign('sales_point_id')->references('id')->on('sales_points');
            $table->unsignedBigInteger('award_project_id')->nullable();
            $table->foreign('award_project_id')->references('id')->on('award_projects');
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
        Schema::dropIfExists('asignacion_projects');
    }
}

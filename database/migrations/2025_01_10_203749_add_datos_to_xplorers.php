<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDatosToXplorers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('xplorers', function (Blueprint $table) {
            $table->string('apellido')->nullable();
            $table->string('telefono')->nullable();
            $table->integer('edad')->nullable();
            $table->string('tipo_documento')->nullable();
            $table->integer('status')->default(1)->nullable();
            $table->text('profile_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('xplorers', function (Blueprint $table) {
            //
        });
    }
}

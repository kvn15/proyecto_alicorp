<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeIniciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_inicios', function (Blueprint $table) {
            $table->id();
            $table->string('home_slide')->nullable();
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
<<<<<<< HEAD:database/migrations/2024_10_13_151651_create_home_inicios_table.php
        Schema::dropIfExists('home_inicios');
=======
        Schema::dropIfExists('profile_image');
>>>>>>> 17f0e14a143cd7c929769d21e0423609e6e02649:database/migrations/2024_10_07_204439_add_profile_image_to_admins_table.php
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scouts', function (Blueprint $table) {
            //Basic Information
            $table->increments('scout_id')->unique();
            $table->unsignedInteger('assurance_num');
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->date('date_of_birth');
            $table->string('place_of_birth', 255);
            $table->string('family_status', 255);
            $table->string('address', 255);
            $table->date('membership_date');

            //Contacts
            $table->string('email', 60)->unique()->nullable()->default(NULL);
            $table->string('phone', 20)->nullable()->default(NULL);
            $table->text('scout_info');
            $table->text('personal_info');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scouts');
    }
}

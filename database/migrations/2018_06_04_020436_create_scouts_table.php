<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scouts', function (Blueprint $table) {
            //Authentication Requirements
            $table->increments('scout_id');
            $table->string('email')->unique();
            $table->string('password');

            //Business Data Requirements
            $table->string('first-name');
            $table->string('last-name');
            $table->date('date-of-birth');
           
            $table->rememberToken();

            //Not sure if we really need to store timestamps though ... -@hzerrad
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
        Schema::dropIfExists('users');
    }
}

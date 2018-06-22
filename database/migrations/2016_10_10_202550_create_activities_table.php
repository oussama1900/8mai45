<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('activity_id');
            $table->string('title', 60);
            $table->string('desc');
            $table->timestamp('activity_time');
            $table->string('activity_place', 20);
        });

        Schema::create('concerned', function (Blueprint $table) {
            $table->unsignedInteger('scout_id');
            $table->unsignedInteger('activity_id');
            $table->primary(array('scout_id', 'activity_id'));
            $table->foreign('scout_id')->references('scout_id')->on('captains')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('activity_id')->references('activity_id')->on('activities')
                    ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('activitytags', function(Blueprint $table){
            $table->integer('activity_id')->unsigned();
            $table->integer('tag');
            $table->primary(array('activity_id', 'tag'));
            $table->foreign('activity_id')->references('activity_id')->on('activities')
                    ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::dropIfExists('activitytags');
        Schema::dropIfExists('concerned');
        Schema::dropIfExists('activities');
    }
}

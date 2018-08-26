<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('event_id');
            $table->unsignedInteger('created_by');
            $table->string('title', 60);
            $table->text('description');
            $table->string('type', 255);
            $table->integer('responsible')->unsigned();
            $table->string('commision', 4);
            $table->dateTime('event_time');
            $table->string('location', 50);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->text('event_image');
            $table->boolean('approved');

            $table->foreign('responsible')->references('scout_id')->on('users')
                  ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('created_by')->references('scout_id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('concerned', function (Blueprint $table) {
            $table->unsignedInteger('scout_id');
            $table->unsignedInteger('event_id');
            $table->boolean('presence');
            $table->text('absence_cause');
            $table->primary(array('scout_id', 'event_id'));
            $table->foreign('scout_id')->references('scout_id')->on('captains')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('event_id')->references('event_id')->on('events')
                    ->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::create('editedevents', function(Blueprint $table){
            $table->integer('event_id')->unsigned();
            $table->integer('editor')->unsigned();
            $table->primary(array('event_id', 'editor'));

            $table->foreign('event_id')->references('event_id')->on('events')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('editor')->references('scout_id')->on('users')
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

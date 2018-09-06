<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('post_id');
            $table->unsignedInteger('posted_by');
            $table->char('linked_unit')->nullable();
            $table->string('post_title', 60);
            $table->string('location', 60);
            $table->dateTime('post_date');
            $table->text('description');
            $table->text('post_summary');
            $table->string('post_type');
            $table->boolean('approved');
            $table->timestamps();
            $table->foreign('posted_by')->references('scout_id')->on('users');
        });

        Schema::create('postimages', function(Blueprint $table){
            $table->integer('post_id')->unsigned();
            $table->string('image');
            $table->primary(array('post_id', 'image'));
            $table->foreign('post_id')->references('post_id')->on('posts')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('editedposts', function(Blueprint $table){
            $table->integer('post_id')->unsigned();
            $table->integer('editor')->unsigned();
            $table->dateTime('updated_at');
            $table->primary(array('post_id', 'editor','updated_at'));

            $table->foreign('post_id')->references('post_id')->on('posts')
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
        Schema::dropIfExists('postimages');
        Schema::dropIfExists('editedposts');
        Schema::dropIfExists('posts');

    }
}
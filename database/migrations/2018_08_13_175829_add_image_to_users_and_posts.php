<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class AddImageToUsersAndPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scouts',function($table){
            $table->text('image');
        });
        Schema::table('posts',function($table){
            $table->string('cover_image');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scouts',function($table){
            $table->dropColumn('image');
        });
        Schema::table('posts',function($table){
            $table->dropColumn('cover_image');
        });
    }
}

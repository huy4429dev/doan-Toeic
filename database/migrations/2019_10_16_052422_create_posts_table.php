<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->mediumIncrements('id');
            $table->string('title',255);
            $table->string('thumbnail',255)->nullable();
            $table->text('content')->nullable();
            $table->string('description',255)->nullable();
            $table->string('audio_ques',255)->nullable();
            $table->string('answer',255)->nullable(); 
            $table->tinyInteger('level')->nullable();
            $table->mediumInteger('topic_id');
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
        Schema::dropIfExists('posts');
    }
}

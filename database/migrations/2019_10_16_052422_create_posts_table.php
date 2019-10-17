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
            $table->mediumInteger('topic_id');
            $table->timestamps();
            // vi du may cay tren chung do minh them nhung cai can cua minh vao thoi ok chua thay ok thay
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostarticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postarticles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',255);
            $table->string('summary',255);
            $table->mediumText('content');
            $table->string('thumbnail',255);
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
        Schema::dropIfExists('postarticles');
    }
}

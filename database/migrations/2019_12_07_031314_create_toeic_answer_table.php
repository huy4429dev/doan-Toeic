<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToeicAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toeic_answer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('A',255)->nullable();
            $table->string('B',255)->nullable();
            $table->string('C',255)->nullable();
            $table->string('D',255)->nullable();
            $table->integer('id_question');
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
        Schema::dropIfExists('toeic_answer');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToeicQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toeic_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('content')->nullable();
            $table->string('thumbnail',255)->nullable();
            $table->integer('toeic_part_id');
            $table->integer('toeic_exam_id');
            $table->string('answer',255);
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
        Schema::dropIfExists('toeic_questions');
    }
}

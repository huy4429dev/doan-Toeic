<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToeicParaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toeic_para', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',255);
            $table->text('content');
            $table->bigInteger('toeic_part_id');
            $table->bigInteger('toeic_exam_id');
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
        Schema::dropIfExists('toeic_para');
    }
}

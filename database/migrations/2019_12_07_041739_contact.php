<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Contact extends Migration
{
    public $table = "cotizacion";
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('contact', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('title');
            $table->text('content');
            $table->text('answer')->nullable();
            $table->integer('student_id');
            $table->boolean('view');
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
        Schema::dropIfExists('contact');
    }
}

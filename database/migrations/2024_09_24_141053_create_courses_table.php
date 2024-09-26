<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('course_image')->nullable(); 
            $table->string('video')->nullable(); 
            $table->text('exercises')->nullable(); 
            $table->timestamps();
        });
    }    

    public function down()
    {
        Schema::dropIfExists('courses');
    }
};

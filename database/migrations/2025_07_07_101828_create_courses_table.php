<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g., foundations, discipleship
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->text('about_course')->nullable();
            $table->string('course_video')->nullable(); // could be URL
            $table->string('course_image')->nullable(); // could be URL
            $table->longText('course_text')->nullable();
            $table->string('color_code')->nullable(); // e.g., #683504
            $table->softDeletes(); // for soft deletion
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

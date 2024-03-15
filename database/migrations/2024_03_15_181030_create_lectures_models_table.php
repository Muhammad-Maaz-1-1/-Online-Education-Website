<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lectures_models', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('video');
            $table->string('description');
            $table->unsignedBigInteger('course_id'); // Assuming course_id is a big integer
            $table->foreign('course_id')->references('id')->on('program_models');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lectures_models');
    }
};

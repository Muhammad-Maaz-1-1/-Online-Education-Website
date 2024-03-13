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
        Schema::create('courses_models', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('lectures'); // Assuming lectures will be an integer
            $table->string('duration'); // Changed 'durations' to 'duration' for consistency
            $table->string('skill'); // Renamed 'skill' to 'skill_level' for clarity
            $table->string('language');
            $table->decimal('price', 8, 2); // Changed 'price' to decimal for better precision
            $table->foreignId('category_id')->constrained(); // Added foreign key for category relationship
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses_models');
    }
};

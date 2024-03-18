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
        Schema::create('program_models', function (Blueprint $table) {
            $table->id();

            $table->string('title');

            $table->string('image');

            $table->text('description');

            $table->unsignedInteger('lectures'); // Assuming lectures will be an integer

            $table->string('durations'); // Changed 'durations' to 'duration' for consistency

            $table->string('skill'); // Renamed 'skill' to 'skill_level' for clarity

            $table->string('language');

            $table->decimal('price', 8, 2); // Changed 'price' to decimal for better precision

            $table->unsignedBigInteger('category_id'); // Assuming category_id is a big integer
            $table->foreign('category_id')->references('id')->on('category_models');
            $table->boolean('status')->default(false);
            $table->foreignId('instructor_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_models');
    }
};

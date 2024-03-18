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
        Schema::create('enrollment_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Assuming user_id is a big integer
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('course_id'); // Assuming course_id is a big integer
            $table->foreign('course_id')->references('id')->on('program_models');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollment_models');
    }
};

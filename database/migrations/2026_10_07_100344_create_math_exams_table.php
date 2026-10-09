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
        Schema::create('math_exams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('grade_level')->nullable();
            $table->text('description')->nullable();
            $table->string('file_path')->nullable(); // PDF file
            $table->string('image')->nullable(); // Thumbnail
            $table->integer('priority')->default(0);
            $table->boolean('is_popular')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('math_exams');
    }
};

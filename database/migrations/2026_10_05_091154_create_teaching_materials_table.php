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
        Schema::create('teaching_materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->default('ទូទៅ');
            $table->string('grade_level')->default('គ្រប់កម្រិតថ្នាក់');
            $table->text('description');
            $table->text('specifications')->nullable();
            $table->string('image')->nullable();
            $table->string('guide_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teaching_materials');
    }
};

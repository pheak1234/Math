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
        Schema::table('math_exams', function (Blueprint $table) {
            $table->integer('duration_minutes')->nullable()->after('is_popular');
            $table->integer('passing_score')->default(50)->after('duration_minutes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('math_exams', function (Blueprint $table) {
            $table->dropColumn(['duration_minutes', 'passing_score']);
        });
    }
};

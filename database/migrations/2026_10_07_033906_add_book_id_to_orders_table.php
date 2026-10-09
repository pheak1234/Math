<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('book_id')->nullable()->after('teaching_material_id')->constrained()->cascadeOnDelete();
            $table->foreignId('teaching_material_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['book_id']);
            $table->dropColumn('book_id');
            $table->foreignId('teaching_material_id')->nullable(false)->change();
        });
    }
};

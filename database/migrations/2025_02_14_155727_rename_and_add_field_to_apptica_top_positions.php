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
        Schema::table('apptica_top_positions', function (Blueprint $table) {
            // Переименовать поле 'date' в 'date_from'
            $table->renameColumn('date', 'date_from');
            // Добавить новое поле 'date_to'
            $table->date('date_to');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apptica_top_positions', function (Blueprint $table) {
            // Переименовать 'date_from' обратно в 'date'
            $table->renameColumn('date_from', 'date');
            // Удалить поле 'date_to'
            $table->dropColumn('date_to');
        });
    }
};

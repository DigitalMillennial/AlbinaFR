<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            // добавляем новые поля для каждого языка
            if (!Schema::hasColumn('questions', 'text_ru')) {
                $table->string('text_ru');
            }
            if (!Schema::hasColumn('questions', 'text_fr')) {
                $table->string('text_fr');
            }
            if (!Schema::hasColumn('questions', 'text_en')) {
                $table->string('text_en');
            }
        });
    }

    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            // удаляем языковые поля, если они есть
            $cols = [];
            foreach (['text_ru', 'text_fr', 'text_en'] as $col) {
                if (Schema::hasColumn('questions', $col)) {
                    $cols[] = $col;
                }
            }
            if (!empty($cols)) {
                $table->dropColumn($cols);
            }
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('groups', function (Blueprint $table) {
            // если колонка существует — приводим к нужной нотации
            if (Schema::hasColumn('groups', 'start_date')) {
                // обязательное поле (NOT NULL)
                $table->date('start_date')->nullable(false)->change();
            }

            if (Schema::hasColumn('groups', 'end_date')) {
                // конечная дата может быть неуказана
                $table->date('end_date')->nullable()->change();
            }
        });
    }

    public function down(): void
    {
        Schema::table('groups', function (Blueprint $table) {
            if (Schema::hasColumn('groups', 'start_date')) {
                // откат: сделаем как было до изменения (если раньше было nullable — адаптируй под свою историю)
                $table->date('start_date')->nullable()->change();
            }

            if (Schema::hasColumn('groups', 'end_date')) {
                // откат: сделаем обязательной (или адаптируй под свою историю)
                $table->date('end_date')->nullable(false)->change();
            }
        });
    }
};

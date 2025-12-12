<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('groups', function (Blueprint $table) {
            // удаляем старое поле description, если оно есть
            if (Schema::hasColumn('groups', 'description')) {
                $table->dropColumn('description');
            }

            // добавляем поле для условного названия группы
            if (!Schema::hasColumn('groups', 'group_name')) {
                $table->string('group_name')->after('id');
            }

            // добавляем связь с курсом
            if (!Schema::hasColumn('groups', 'course_id')) {
                $table->unsignedBigInteger('course_id')->after('group_name');
                $table->foreign('course_id')
                      ->references('id')->on('courses')
                      ->onDelete('cascade');
            }

            // добавляем дату окончания, если её ещё нет
            if (!Schema::hasColumn('groups', 'end_date')) {
                $table->date('end_date')->nullable()->after('course_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('groups', function (Blueprint $table) {
            // убираем внешние ключи и новые поля
            if (Schema::hasColumn('groups', 'course_id')) {
                $table->dropForeign(['course_id']);
            }

            $cols = [];
            foreach (['group_name', 'course_id', 'end_date'] as $col) {
                if (Schema::hasColumn('groups', $col)) {
                    $cols[] = $col;
                }
            }
            if (!empty($cols)) {
                $table->dropColumn($cols);
            }

            // возвращаем старое поле description
            if (!Schema::hasColumn('groups', 'description')) {
                $table->text('description')->nullable();
            }
        });
    }
};

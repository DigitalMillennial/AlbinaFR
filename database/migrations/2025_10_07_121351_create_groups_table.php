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
       Schema::create('groups', function (Blueprint $table) {
    $table->id(); // порядковый номер — это и есть id
    $table->string('level'); // уровень: A1, B2, C1 и т.д.
    $table->text('description')->nullable(); // описание группы
    $table->unsignedTinyInteger('capacity'); // количество мест
    $table->date('start_date');
    $table->date('end_date');
    $table->unsignedSmallInteger('hours'); // количество часов
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};

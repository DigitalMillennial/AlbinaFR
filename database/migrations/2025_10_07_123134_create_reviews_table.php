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
        Schema::create('reviews', function (Blueprint $table) {
    $table->id();
    $table->string('name'); // имя автора
    $table->string('email')->nullable(); // email для связи с Student
    $table->text('text'); // сам отзыв
    $table->date('date');
    $table->foreignId('student_id')->nullable()->constrained()->onDelete('set null');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

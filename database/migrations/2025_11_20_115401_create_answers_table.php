<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')
                  ->constrained('questions')
                  ->onDelete('cascade'); // удаляем ответы вместе с вопросом
            $table->string('text'); // текст ответа
            $table->boolean('is_correct')->default(false); // правильный/неправильный
            $table->integer('weight')->default(0); // вес ответа
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};

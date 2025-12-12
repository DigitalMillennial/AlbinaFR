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
        Schema::create('translations', function (Blueprint $table) {
    $table->id();
    $table->string('group')->nullable(); // например: 'buttons', 'courses', 'slogan'
    $table->string('key');               // например: 'login_button', 'course_description'
    $table->string('locale');            // 'ru', 'en', 'fr'
    $table->text('value');               // сам перевод
    $table->timestamps();

    $table->unique(['key', 'locale']);
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translations');
    }
};

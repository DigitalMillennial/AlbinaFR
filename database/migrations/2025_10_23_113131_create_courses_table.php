<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->enum('niveau', ['A0', 'A1', 'A2', 'B1', 'B2']);
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2)->default(0);
            $table->unsignedTinyInteger('duration_weeks')->default(4);
            $table->unsignedTinyInteger('nb_lessons')->default(8);
            $table->boolean('is_active')->default(true);
            $table->longText('programme')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('courses');
    }
};

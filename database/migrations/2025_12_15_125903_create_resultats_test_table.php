<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resultats_test', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('min')->default(0); // минимум 0-20
            $table->unsignedTinyInteger('max')->default(0); // максимум 0-20
            $table->enum('niveau', ['A0','A1','A2','B1','B2','C1','C2']);
            $table->string('message', 1000);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resultats_test');
    }
};

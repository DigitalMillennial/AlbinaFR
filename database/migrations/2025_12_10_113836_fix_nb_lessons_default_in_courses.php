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
    Schema::table('courses', function (Blueprint $table) {
        $table->unsignedTinyInteger('nb_lessons')->default(8)->change();
    });
}

public function down(): void
{
    Schema::table('courses', function (Blueprint $table) {
        $table->unsignedTinyInteger('nb_lessons')->nullable(false)->change();
    });
}

};

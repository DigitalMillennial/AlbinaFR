<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('services', function (Blueprint $table) {
        $table->id();
        $table->string('de_langue');        // язык исходный
        $table->string('vers_langue');      // язык конечный
        $table->string('fichier_source')->nullable(); // исходный файл
        $table->string('fichier_final')->nullable();  // итоговый файл
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('services');
}

};

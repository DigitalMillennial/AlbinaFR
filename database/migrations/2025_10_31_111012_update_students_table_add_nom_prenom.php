<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('nom')->after('id');
            $table->string('prenom')->after('nom');
        });
    }

    public function down(): void {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('nom');
            $table->dropColumn('prenom');
            $table->string('name')->after('id');
        });
    }
};

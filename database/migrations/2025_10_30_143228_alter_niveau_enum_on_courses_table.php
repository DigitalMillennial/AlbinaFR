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
    DB::statement("ALTER TABLE courses MODIFY niveau ENUM('A0','A1','A2','B1','B2','C1','C2') NOT NULL");
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

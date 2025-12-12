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
    Schema::table('clients', function (Blueprint $table) {
        if (Schema::hasColumn('clients', 'service_type')) {
            $table->dropColumn('service_type');
        }
        if (Schema::hasColumn('clients', 'language_from')) {
            $table->dropColumn('language_from');
        }
        if (Schema::hasColumn('clients', 'language_to')) {
            $table->dropColumn('language_to');
        }
        if (Schema::hasColumn('clients', 'notes')) {
            $table->dropColumn('notes');
        }
    });
}

public function down()
{
    Schema::table('clients', function (Blueprint $table) {
        $table->string('service_type')->nullable();
        $table->string('language_from')->nullable();
        $table->string('language_to')->nullable();
        $table->text('notes')->nullable();
    });
}

};

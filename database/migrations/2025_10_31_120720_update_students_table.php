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
    Schema::table('students', function (Blueprint $table) {
        $table->renameColumn('phone', 'telephone');
        $table->string('type_cours')->nullable()->after('telephone');
    });
}

public function down()
{
    Schema::table('students', function (Blueprint $table) {
        $table->renameColumn('telephone', 'phone');
        $table->dropColumn('type_cours');
    });
}

};

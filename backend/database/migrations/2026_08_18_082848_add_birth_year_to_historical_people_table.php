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
        if (!Schema::hasColumn('historical_people', 'birth_year')) {
            Schema::table('historical_people', function (Blueprint $table) {
                $table->integer('birth_year')->nullable()->after('biography');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('historical_people', 'birth_year')) {
            Schema::table('historical_people', function (Blueprint $table) {
                $table->dropColumn('birth_year');
            });
        }
    }
};

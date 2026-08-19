<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('historical_people', function (Blueprint $table) {
            $table->string('name_it')->nullable()->after('name');
            $table->string('name_en')->nullable()->after('name_it');
            $table->string('name_fr')->nullable()->after('name_en');

            $table->text('biography_it')->nullable()->after('biography');
            $table->text('biography_en')->nullable()->after('biography_it');
            $table->text('biography_fr')->nullable()->after('biography_en');
        });
    }

    public function down(): void
    {
        Schema::table('historical_people', function (Blueprint $table) {
            $table->dropColumn([
                'name_it',
                'name_en',
                'name_fr',
                'biography_it',
                'biography_en',
                'biography_fr'
            ]);
        });
    }
};

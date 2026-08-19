<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('historical_events', function (Blueprint $table) {
            $table->string('title_it')->nullable()->after('title');
            $table->string('title_en')->nullable()->after('title_it');
            $table->string('title_fr')->nullable()->after('title_en');

            $table->text('description_it')->nullable()->after('description');
            $table->text('description_en')->nullable()->after('description_it');
            $table->text('description_fr')->nullable()->after('description_en');
        });
    }

    public function down(): void
    {
        Schema::table('historical_events', function (Blueprint $table) {
            $table->dropColumn([
                'title_it',
                'title_en',
                'title_fr',
                'description_it',
                'description_en',
                'description_fr'
            ]);
        });
    }
};

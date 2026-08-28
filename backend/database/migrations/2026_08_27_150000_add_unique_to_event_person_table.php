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
        Schema::table('event_person', function (Blueprint $table) {
            // Add a composite unique index to prevent duplicate associations
            $table->unique(['historical_event_id', 'historical_person_id'], 'event_person_historical_event_id_historical_person_id_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_person', function (Blueprint $table) {
            $table->dropUnique('event_person_historical_event_id_historical_person_id_unique');
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('periods', function (Blueprint $table) {

            if (!Schema::hasColumn('periods', 'name_it')) {
                $table->string('name_it')->nullable();
            }

            if (!Schema::hasColumn('periods', 'name_en')) {
                $table->string('name_en')->nullable();
            }

            if (!Schema::hasColumn('periods', 'name_fr')) {
                $table->string('name_fr')->nullable();
            }

            if (!Schema::hasColumn('periods', 'description_it')) {
                $table->text('description_it')->nullable();
            }

            if (!Schema::hasColumn('periods', 'description_en')) {
                $table->text('description_en')->nullable();
            }

            if (!Schema::hasColumn('periods', 'description_fr')) {
                $table->text('description_fr')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('periods', function (Blueprint $table) {
            $table->dropColumn([
                'name_it',
                'name_en',
                'name_fr',
                'description_it',
                'description_en',
                'description_fr'
            ]);
        });
    }
};

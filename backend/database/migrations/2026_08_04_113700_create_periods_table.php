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
        Schema::create('periods', function (Blueprint $table) {
            $table->id();

            // Nome originale
            $table->string('name');

            // Nomi multilingua
            $table->string('name_it')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_fr')->nullable();

            // Descrizione originale
            $table->text('description')->nullable();

            // Descrizioni multilingua
            $table->text('description_it')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_fr')->nullable();

            $table->date('start_date');
            $table->date('end_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periods');
    }
};
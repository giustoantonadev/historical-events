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
        Schema::create('historical_people', function (Blueprint $table) {
            $table->id();

            // Nome originale
            $table->string('name');

            // Nomi multilingua
            $table->string('name_it')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_fr')->nullable();

            // Biografia originale
            $table->text('biography');

            // Biografie multilingua
            $table->text('biography_it')->nullable();
            $table->text('biography_en')->nullable();
            $table->text('biography_fr')->nullable();

            // Anno di nascita
            $table->integer('birth_year')->nullable();

            // Immagine/personaggio
            $table->string('portrait')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historical_people');
    }
};
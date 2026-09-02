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
        Schema::create('historical_events', function (Blueprint $table) {
            $table->id();

            // Titolo originale
            $table->string('title');

            // Titoli multilingua
            $table->string('title_it')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_fr')->nullable();

            // Descrizione originale
            $table->text('description');

            // Descrizioni multilingua
            $table->text('description_it')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_fr')->nullable();

            $table->integer('year');

            // Immagine evento
            $table->string('image')->nullable();

            // Relazione con periods
            $table->foreignId('period_id')
                ->constrained()
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historical_events');
    }
};
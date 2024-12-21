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
        Schema::create('comptes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('abonne_id')->constrained()->onDelete('cascade');
            $table->string('libelle');
            $table->string('description')->nullable();
            $table->string('banque', 5);
            $table->string('agence', 5);
            $table->string('numerocompte', 11);
            $table->string('clerib', 2);
            $table->decimal('montant', 10, 2)->default(0);
            $table->string('domiciliation')->nullable();
            $table->boolean('statut')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comptes');
    }
};

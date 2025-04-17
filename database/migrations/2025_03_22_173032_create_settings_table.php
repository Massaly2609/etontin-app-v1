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
        Schema::create('settings', function (Blueprint $table) {
            $table->id(); // Identifiant unique
            $table->string('key')->unique(); // Clé du paramètre (unique)
            $table->json('value')->nullable(); // Valeur du paramètre (peut être un tableau JSON)
            $table->text('description')->nullable(); // Description optionnelle
            $table->timestamps(); // Horodatages created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

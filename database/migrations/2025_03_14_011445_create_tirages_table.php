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
         Schema::create('tirages', function (Blueprint $table) {
        //$table->id();
        $table->unsignedBigInteger('idUser');
        $table->unsignedBigInteger('idTontine');
        $table->primary(['idUser', 'idTontine']);
        $table->timestamps();

        $table->foreign('idUser')->references('id')->on('users');
        $table->foreign('idTontine')->references('id')->on('tontines');
   });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tirages');
    }
};

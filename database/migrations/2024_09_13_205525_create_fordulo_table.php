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
        Schema::create('fordulo', function (Blueprint $table) {
            $table->string('nehezseg');
            $table->date('datum')->primary();
            $table->string('verseny_nev')->unique();
            $table->integer('verseny_ev')->unique();

            $table->foreign('verseny_nev')->references('nev')->on('verseny')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('verseny_ev')->references('ev')->on('verseny')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fordulo', function (Blueprint $table) {
            $table->dropForeign(['verseny_nev']);
            $table->dropForeign(['verseny_ev']);
            $table->dropUnique(['verseny_nev','verseny_ev']);
        });
        Schema::dropIfExists('fordulo');
    }
};

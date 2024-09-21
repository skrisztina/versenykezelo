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
        Schema::create('versenyez', function (Blueprint $table) {
            $table->string('verseny_nev');
            $table->integer('verseny_ev');
            $table->string('versenyzo_email');
            $table->date('fordulo_datum');

            $table->foreign('verseny_nev')->references('verseny_nev')->on('fordulo')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('verseny_ev')->references('verseny_ev')->on('fordulo')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('versenyzo_email')->references('email')->on('versenyzo')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fordulo_datum')->references('datum')->on('fordulo')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('versenyez', function (Blueprint $table) {
            $table->dropForeign(['verseny_nev']);
            $table->dropForeign(['verseny_nev']);
            $table->dropForeign(['versenyzo_email']);
            $table->dropForeign(['fordulo_datum']);
        });
        Schema::dropIfExists('versenyez');
    
    }
};

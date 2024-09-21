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
        Schema::create('verseny', function (Blueprint $table) {
            $table->string('nev')->unique();
            $table->integer('ev')->unique();
            $table->string('helyszin');
            $table->string('nyelvek');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verseny');
    }
};

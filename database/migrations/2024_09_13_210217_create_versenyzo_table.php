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
        Schema::create('versenyzo', function (Blueprint $table) {
            $table->string('nev');
            $table->string('email')->primary();
            $table->date('szul_ido');
            $table->integer('rang');
            $table->date('versenyzes_kezdete');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('versenyzo');
    }
};

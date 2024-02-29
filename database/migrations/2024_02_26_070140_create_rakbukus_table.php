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
        Schema::create('rakbuku', function (Blueprint $table) {
            $table->id('idBuku')->nullable()->constrained();
            $table->string('judul');
            $table->string('penulis');
            $table->string('penerbit');
            $table->integer('tahunterbit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rakbuku');
    }
};

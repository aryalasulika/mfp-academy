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
        Schema::create('hasil_latihans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_latihan_id')
                  ->constrained('jadwal_latihan')
                  ->onDelete('cascade');
            $table->text('deskripsi');
            $table->text('catatan_pelatih')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_latihans');
    }
};

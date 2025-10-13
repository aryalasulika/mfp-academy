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
        Schema::table('users', function (Blueprint $table) {
            $table->string('kelompok_usia')->nullable()->after('role'); // Untuk Peserta
            $table->string('posisi')->nullable()->after('kelompok_usia'); // Untuk Peserta
            $table->string('foto_profil')->nullable()->after('posisi'); // Untuk semua user
            $table->string('kelompok_usia_asuhan')->nullable()->after('foto_profil'); // Untuk Coach
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['kelompok_usia', 'posisi', 'foto_profil', 'kelompok_usia_asuhan']);
        });
    }
};
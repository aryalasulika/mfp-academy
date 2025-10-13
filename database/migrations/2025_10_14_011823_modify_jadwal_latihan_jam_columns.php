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
        Schema::table('jadwal_latihan', function (Blueprint $table) {
            // Drop kolom jam yang lama
            $table->dropColumn('jam');
            
            // Tambah kolom jam_in dan jam_out dengan tipe time
            $table->time('jam_in')->after('tanggal');
            $table->time('jam_out')->after('jam_in');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal_latihan', function (Blueprint $table) {
            // Rollback: hapus kolom baru dan tambah kembali kolom lama
            $table->dropColumn(['jam_in', 'jam_out']);
            $table->string('jam')->after('tanggal');
        });
    }
};

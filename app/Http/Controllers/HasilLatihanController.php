<?php

namespace App\Http\Controllers;

use App\Models\HasilLatihan;
use App\Models\JadwalLatihan;
use Illuminate\Http\Request;

class HasilLatihanController extends Controller
{
    /**
     * Tampilkan form untuk membuat laporan hasil latihan
     */
    public function create(JadwalLatihan $jadwalLatihan)
    {
        // Pastikan jadwal ini belum memiliki laporan
        if ($jadwalLatihan->hasilLatihan) {
            return redirect()->route('admin.jadwal_latihan.index')
                           ->with('error', 'Jadwal ini sudah memiliki laporan hasil latihan.');
        }

        return view('admin.hasil_latihan.create', compact('jadwalLatihan'));
    }

    /**
     * Simpan laporan hasil latihan baru
     */
    public function store(Request $request, JadwalLatihan $jadwalLatihan)
    {
        $request->validate([
            'deskripsi' => 'required|string',
            'catatan_pelatih' => 'nullable|string',
        ]);

        // Pastikan jadwal ini belum memiliki laporan
        if ($jadwalLatihan->hasilLatihan) {
            return redirect()->route('admin.jadwal_latihan.index')
                           ->with('error', 'Jadwal ini sudah memiliki laporan hasil latihan.');
        }

        // Buat laporan menggunakan relasi
        $jadwalLatihan->hasilLatihan()->create([
            'deskripsi' => $request->deskripsi,
            'catatan_pelatih' => $request->catatan_pelatih,
        ]);

        return redirect()->route('admin.jadwal_latihan.index')
                       ->with('success', 'Laporan hasil latihan berhasil disimpan!');
    }

    /**
     * Tampilkan detail laporan hasil latihan
     */
    public function show(HasilLatihan $hasilLatihan)
    {
        $hasilLatihan->load('jadwalLatihan');
        return view('admin.hasil_latihan.show', compact('hasilLatihan'));
    }
}

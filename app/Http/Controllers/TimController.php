<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TimController extends Controller
{
    public function show($kelompok_usia)
    {
        // Mencari satu user COACH yang memiliki kelompok_usia_asuhan sesuai parameter
        $pelatih = User::where('role', 'coach')
                      ->where('kelompok_usia_asuhan', $kelompok_usia)
                      ->first();
        
        // Mencari semua user PESERTA yang memiliki kelompok_usia sesuai parameter
        $pemain = User::where('role', 'peserta')
                     ->where('kelompok_usia', $kelompok_usia)
                     ->orderBy('name', 'asc')
                     ->get();
        
        return view('landing-page.tim', compact('pelatih', 'pemain', 'kelompok_usia'));
    }
}

<?php
namespace App\Http\Controllers;

use App\Models\JadwalLatihan;
use Illuminate\Http\Request;

class JadwalLatihanController extends Controller
{
    // Public page
    public function index()
    {
        $jadwal = JadwalLatihan::orderBy('tanggal', 'asc')->get();
        return view('jadwal-latihan', compact('jadwal'));
    }

    // Admin: list
    public function adminIndex()
    {
        $jadwal = JadwalLatihan::orderBy('tanggal', 'asc')->get();
        return view('admin.jadwal_latihan.index', compact('jadwal'));
    }

    // Admin: create form
    public function create()
    {
        return view('admin.jadwal_latihan.create');
    }

    // Admin: store
    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required',
            'jam' => 'required',
            'kelompok_usia' => 'required',
            'jenis_latihan' => 'required',
            'lokasi' => 'required',
        ]);
        JadwalLatihan::create($request->all());
        return redirect()->route('admin.jadwal_latihan.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    // Admin: edit form
    public function edit($id)
    {
        $jadwal = JadwalLatihan::findOrFail($id);
        return view('admin.jadwal_latihan.edit', compact('jadwal'));
    }

    // Admin: update
    public function update(Request $request, $id)
    {
        $request->validate([
            'hari' => 'required',
            'jam' => 'required',
            'kelompok_usia' => 'required',
            'jenis_latihan' => 'required',
            'lokasi' => 'required',
        ]);
        $jadwal = JadwalLatihan::findOrFail($id);
        $jadwal->update($request->all());
        return redirect()->route('admin.jadwal_latihan.index')->with('success', 'Jadwal berhasil diupdate.');
    }

    // Admin: delete
    public function destroy($id)
    {
        $jadwal = JadwalLatihan::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('admin.jadwal_latihan.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}

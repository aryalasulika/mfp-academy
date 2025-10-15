<?php
namespace App\Http\Controllers;

use App\Models\JadwalLatihan;
use Illuminate\Http\Request;

class JadwalLatihanController extends Controller
{
    // Public page
    public function index(Request $request)
    {
        $query = JadwalLatihan::query();

        // Search by jenis_latihan or lokasi
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('jenis_latihan', 'like', "%{$search}%")
                  ->orWhere('lokasi', 'like', "%{$search}%");
            });
        }

        // Filter by kelompok_usia
        if ($request->filled('kelompok_usia')) {
            $query->where('kelompok_usia', $request->get('kelompok_usia'));
        }

        // Filter by hari
        if ($request->filled('hari')) {
            $query->where('hari', $request->get('hari'));
        }

        // Order by date ascending for public view
        $query->orderBy('tanggal', 'asc');

        // Paginate 10 per page and keep query params
        $jadwal = $query->paginate(10)->appends($request->query());

        return view('jadwal-latihan', compact('jadwal'));
    }

    // Admin: list
    public function adminIndex(Request $request)
    {
        $query = JadwalLatihan::with('hasilLatihan');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('jenis_latihan', 'like', "%{$search}%")
                  ->orWhere('lokasi', 'like', "%{$search}%");
            });
        }

        // Filter by kelompok_usia
        if ($request->filled('kelompok_usia')) {
            $query->where('kelompok_usia', $request->get('kelompok_usia'));
        }

        // Filter by hari
        if ($request->filled('hari')) {
            $query->where('hari', $request->get('hari'));
        }

        // Sorting functionality
        $sortableColumns = ['tanggal', 'hari', 'jam_in', 'jam_out', 'kelompok_usia', 'jenis_latihan', 'lokasi'];
        $sort = $request->get('sort', 'tanggal');
        $direction = $request->get('direction', 'asc');

        // Validate sort column and direction
        if (!in_array($sort, $sortableColumns)) {
            $sort = 'tanggal';
        }
        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'asc';
        }

        $query->orderBy($sort, $direction);

        // Secondary sort for consistent ordering
        if ($sort !== 'tanggal') {
            $query->orderBy('tanggal', 'asc');
        }

        // Pagination with search parameters preserved
        $jadwal = $query->paginate(10)->appends($request->query());

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
            'tanggal' => 'required|date',
            'jam_in' => 'required|date_format:H:i',
            'jam_out' => 'required|date_format:H:i|after:jam_in',
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
            'tanggal' => 'required|date',
            'jam_in' => 'required|date_format:H:i',
            'jam_out' => 'required|date_format:H:i|after:jam_in',
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

<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::orderByDesc('created_at')->paginate(10);
        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'judul' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
        ]);
        $path = $request->file('file')->store('galeri', 'public');
        Galeri::create([
            'judul' => $request->judul,
            'file' => $path,
            'tipe' => $request->file('file')->getClientMimeType(),
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('admin.galeri.index')->with('success', 'Media galeri berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $item = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Galeri::findOrFail($id);
        $data = $request->validate([
            'judul' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
        ]);
        if ($request->hasFile('file')) {
            $request->validate(['file' => 'file|mimes:jpg,jpeg,png,gif,webp|max:2048']);
            if ($item->file && Storage::disk('public')->exists($item->file)) {
                Storage::disk('public')->delete($item->file);
            }
            $data['file'] = $request->file('file')->store('galeri', 'public');
            $data['tipe'] = $request->file('file')->getClientMimeType();
        }
        $item->update($data);
        return redirect()->route('admin.galeri.index')->with('success', 'Media galeri berhasil diupdate.');
    }

    public function destroy($id)
    {
        $item = Galeri::findOrFail($id);
        if ($item->file && Storage::disk('public')->exists($item->file)) {
            Storage::disk('public')->delete($item->file);
        }
        $item->delete();
        return redirect()->route('admin.galeri.index')->with('success', 'Media galeri berhasil dihapus.');
    }
}

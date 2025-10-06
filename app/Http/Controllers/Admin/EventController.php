<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('tanggal', 'desc')->paginate(20);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'lokasi' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $data = $request->all();
        
        // Generate slug from judul
        $data['slug'] = \App\Models\Event::generateUniqueSlug($request->judul);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('storage/events'), $imageName);
            $data['image'] = 'storage/events/' . $imageName;
        }
        
        Event::create($data);
        return redirect()->route('admin.events.index')->with('success', 'Acara berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'lokasi' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $event = Event::findOrFail($id);
        $data = $request->all();
        
        // Update slug if judul changed
        if ($request->judul !== $event->judul) {
            $data['slug'] = \App\Models\Event::generateUniqueSlug($request->judul);
        }
        
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($event->image && file_exists(public_path($event->image))) {
                unlink(public_path($event->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('storage/events'), $imageName);
            $data['image'] = 'storage/events/' . $imageName;
        }
        
        $event->update($data);
        return redirect()->route('admin.events.index')->with('success', 'Acara berhasil diupdate.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        
        // Delete image if exists
        if ($event->image && file_exists(public_path($event->image))) {
            unlink(public_path($event->image));
        }
        
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Acara berhasil dihapus.');
    }
}

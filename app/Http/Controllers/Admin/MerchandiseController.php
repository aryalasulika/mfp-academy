<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class MerchandiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merchandise = Merchandise::latest()->paginate(10);
        return view('admin.merchandise.index', compact('merchandise'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Merchandise::getCategories();
        return view('admin.merchandise.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|in:Jersey,Jaket,Kaos,Celana,Aksesoris',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/merchandise'), $imageName);
            $imagePath = 'storage/merchandise/' . $imageName;
        }

        Merchandise::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $imagePath,
            'is_active' => $request->has('is_active') ? true : false
        ]);

        return redirect()->route('admin.merchandise.index')
                        ->with('success', 'Merchandise berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Merchandise $merchandise)
    {
        return view('admin.merchandise.show', compact('merchandise'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merchandise $merchandise)
    {
        $categories = Merchandise::getCategories();
        return view('admin.merchandise.edit', compact('merchandise', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Merchandise $merchandise)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|in:Jersey,Jaket,Kaos,Celana,Aksesoris',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        $imagePath = $merchandise->image;
        if ($request->hasFile('image')) {
            // Delete old image
            if ($merchandise->image && file_exists(public_path($merchandise->image))) {
                unlink(public_path($merchandise->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/merchandise'), $imageName);
            $imagePath = 'storage/merchandise/' . $imageName;
        }

        $merchandise->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $imagePath,
            'is_active' => $request->has('is_active') ? true : false
        ]);

        return redirect()->route('admin.merchandise.index')
                        ->with('success', 'Merchandise berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merchandise $merchandise)
    {
        // Delete image file
        if ($merchandise->image && file_exists(public_path($merchandise->image))) {
            unlink(public_path($merchandise->image));
        }

        $merchandise->delete();

        return redirect()->route('admin.merchandise.index')
                        ->with('success', 'Merchandise berhasil dihapus.');
    }
}

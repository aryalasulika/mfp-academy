<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchandise;

class MerchandiseController extends Controller
{
    public function index()
    {
        // Mengambil data merchandise dari database yang aktif
        $merchandise = Merchandise::active()->get()->map(function($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'image' => $item->image,
                'description' => $item->description,
                'category' => $item->category
            ];
        });

        return view('merchandise', compact('merchandise'));
    }
}

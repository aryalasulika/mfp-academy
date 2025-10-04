<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchandise;

class MerchandiseController extends Controller
{
    public function index()
    {
        // Mengambil data merchandise dari database yang aktif dengan pagination
        $merchandise = Merchandise::active()
                                ->orderBy('created_at', 'desc')
                                ->paginate(9); // 9 produk per halaman (3x3 grid)

        return view('merchandise', compact('merchandise'));
    }
}

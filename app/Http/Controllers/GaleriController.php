<?php
namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    // Public gallery page
    public function index()
    {
        $galeri = Galeri::orderByDesc('created_at')->get();
        return view('galeri', compact('galeri'));
    }
}

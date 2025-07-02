<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesertaDashboardController extends Controller
{
    /**
     * Show the peserta dashboard.
     */
    public function index()
    {
        return view('dashboard.peserta.index');
    }
}

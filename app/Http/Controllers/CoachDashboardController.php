<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoachDashboardController extends Controller
{
    /**
     * Show the coach dashboard.
     */
    public function index()
    {
        return view('dashboard.coach.index');
    }
}

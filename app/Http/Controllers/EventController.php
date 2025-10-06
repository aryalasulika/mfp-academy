<?php
namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Public page
    public function index()
    {
        $events = Event::orderBy('tanggal', 'asc')->get();
        return view('event', compact('events'));
    }

    // Public detail page
    public function show(Event $event)
    {
        return view('event-detail', compact('event'));
    }
}

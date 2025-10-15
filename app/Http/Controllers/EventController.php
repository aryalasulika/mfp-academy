<?php
namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Public page
    public function index()
    {
        // Paginate events, showing 9 per page (3 rows x 3 cards)
        $events = Event::orderBy('tanggal', 'desc')
                       ->paginate(9);
        
        return view('event', compact('events'));
    }

    // Public detail page
    public function show(Event $event)
    {
        return view('event-detail', compact('event'));
    }
}

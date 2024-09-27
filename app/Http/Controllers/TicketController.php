<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Mail\TicketOpened;
use App\Mail\TicketClosed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    public function index()
{
    if (!Auth::check()) {
        //will show an error message if not signed in
        return redirect()->route('login')->withErrors('You must be logged in to view tickets.');
    }
    $tickets = null;

    //submitted tickets from the ticket table
    if (Auth::user()->role == 'admin') {
        $tickets = Ticket::orderBy('created_at', 'desc')->get();
    }

    // Customer's submitted tickets
    if (Auth::user()->role == 'customer') {
        $tickets = Ticket::where('user_id', Auth::id())
                         ->orderBy('created_at', 'desc')
                         ->get();
    }

    return view('dashboard', compact('tickets'));
}


public function create()
{
    return view('customer.create');
}

public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    // Create a new ticket
    $ticket = Ticket::create([
        'user_id' => Auth::id(),
        'title' => $request->title,
        'content' => $request->content,
        'status' => 'open',
    ]);

    // Send email notification to the admin
    Mail::to('admin@gmail.com')->send(new TicketOpened($ticket));

    // Success message
    return redirect()->route('dashboard')->with('success', 'Ticket created successfully.');
}


public function close(Request $request, Ticket $ticket)
{
    //will Check if the ticket is already closed
    if ($ticket->status !== 'closed') {
        $ticket->status = 'closed';
        $ticket->save();

        //send email notification about closing the ticket
        Mail::to($ticket->user->email)->send(new TicketClosed($ticket));

        return redirect()->route('tickets.index')->with('success', 'Ticket closed successfully.');
    }

    return redirect()->route('tickets.index')->withErrors('Ticket is already closed.');
}


public function closeViaEmail(Ticket $ticket)
{
    if ($ticket->status == 'closed') {
        return redirect()->route('dashboard')->with('error', 'Ticket is already closed.');
    }

    // Close the ticket
    $ticket->status = 'closed';
    $ticket->save();

    // Send email notification to the customer
    Mail::to($ticket->user->email)->send(new TicketClosed($ticket));

    return redirect()->route('dashboard')->with('success', 'Ticket closed successfully.');
}

}

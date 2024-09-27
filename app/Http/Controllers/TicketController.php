<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use App\Notifications\OpenTicket;
use Illuminate\Http\Request;

class TicketController extends Controller
{


    public function index()
    {
       
        $tickets = Ticket::with(['user', 'responder.roles'])
            ->where('user_id', auth()->id())
            ->get();

        // dd($tickets);
    
        return view('dashboard', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
        ]);


        $ticket = Ticket::create([
            'user_id' => auth()->id(),
            'subject' => $request->subject,
            'description' => $request->description,
            'status' => true,
        ]);

        $admins = User::role('admin')->get();


        foreach ($admins as $admin) {
            $admin->notify(new OpenTicket($ticket));
        }


        return redirect()->route('dashboard')->with('status', 'Your issue has been submitted!');
    }
}

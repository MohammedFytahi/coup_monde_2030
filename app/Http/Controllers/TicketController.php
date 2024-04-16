<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{

    // public function ticketConfirmation($ticket_id)
    // {
    //     $tickets = Ticket::findOrFail($ticket_id);

    //     return view('tickets.ticket-confirmation', compact('tickets'));
    // }
    public function reserveTicket(Request $request, $match_id)
    {

        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $tickets = [];
        for ($i = 0; $i < $validatedData['quantity']; $i++) {
            $ticket = new Ticket();
            $ticket->match_id = $match_id;
            $ticket->user_id = auth()->user()->id;
            $ticket->date_reserved = now();
            $ticket->quantity = 1;
            $ticket->save();
            $tickets[] = $ticket;
        }

        return view('tickets.ticket-confirmation', compact('tickets'));
    }
}

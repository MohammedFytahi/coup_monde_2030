<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Matche;
use Dompdf\Dompdf;
use Dompdf\Options;


class TicketController extends Controller
{

   
   
public function reserveTicket(Request $request, $match_id)
{
    $match = Matche::findOrFail($match_id);

    if ($match->available_seats <= 0) {
        return redirect()->back()->with('error', 'Tickets are sold out for this match.');
    }

    $validatedData = $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    if ($validatedData['quantity'] > $match->available_seats) {
        return redirect()->back()->with('error', 'Requested quantity exceeds available seats.');
    }

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

    $match->available_seats -= $validatedData['quantity'];
    $match->save();

    return view('tickets.ticket-confirmation', compact('tickets'));
}




    public function generatePDF($ticket_id)
    {
        $tickets = Ticket::findOrFail($ticket_id);

        $html = view('tickets.ticket-confirmation', compact('tickets'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        $dompdf->render();

        return $dompdf->stream("ticket_confirmation.pdf");
    }
    



}

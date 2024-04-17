<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Dompdf\Dompdf;
use Dompdf\Options;

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



    public function generatePDF($ticket_id)
    {
        $tickets = Ticket::findOrFail($ticket_id);
        
        // Générer la vue avec le ticket spécifique
        $html = view('tickets.ticket-confirmation', compact('tickets'))->render();
    
        // Charger le HTML dans Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
    
        // Rendre le PDF
        $dompdf->render();
    
        // Télécharger le PDF
        return $dompdf->stream("ticket_confirmation.pdf");
    }
    



}

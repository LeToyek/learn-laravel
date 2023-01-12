<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    //
    public function index(Ticket $ticket){
        return view('ticket',[
            'title' => 'Ticket',
            'ticket'=>$ticket]);
    }
}

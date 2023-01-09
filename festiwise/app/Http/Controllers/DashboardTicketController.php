<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class DashboardTicketController extends Controller
{
    //
    public function show(){
        return view('dashboard.tickets.index',[
            'title' => 'Tickets',
            'tickets' => Ticket::where('user_id',auth()->user()->id)->get()
        ]);
    }
}

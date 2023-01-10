<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('events',[
            'title'=> 'events',
            'events' => Event::paginate(6),
        ]);
        //
    }
    public function show(Event $event){
        return view('detail',[
            'title'=> 'event',
            'event' => $event,
        ]);
    }
    public function buyTicket(Request $request){
        $validatedData = $request->validate([
            'event_id' => 'required'
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        Ticket::create($validatedData);
        Alert::success('Payment Success', 'Your payment is already proceed, check your email to get your ticket');
        return redirect('events');
    }
}

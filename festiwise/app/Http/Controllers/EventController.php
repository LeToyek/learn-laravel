<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;
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
        $events = Event::latest();

        if (request('search')) {
            $events->where('title','like','%'. request('search').'%');
        }
        return view('events',[
            'title'=> 'events',
            'events' => $events->paginate(6),
        ]);
        //
    }
    public function show(Event $event){
        return view('detail',[
            'title'=> 'events',
            'event' => $event,
        ]);
    }
    public function buyTicket(Request $request,Event $event){
        
        $validatedData = $request->validate([
            'event_id' => 'required'
        ]);
        $validatedData['user_id'] = auth()->user()->id;

        if (Ticket::where('user_id', $validatedData['user_id'])->where('event_id',$validatedData['event_id'])->exists()) {
            Alert::error('Payment failed',"You've already bought this ticket!");
            return redirect('events');
        }
        Event::where( 'id',$event->id)->update(['stock' => $event->stock-1]);
        $ticket = Ticket::create($validatedData);
        
        Alert::success('Payment Success', 'Your payment is already proceed, check your email to get your ticket');
        return redirect('ticket/' . $ticket->barcode);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use App\Models\Ticket;
use GuzzleHttp\Psr7\Request;
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
        $request['user_id'] = auth()->user()->id;
        dd($request);
        Ticket::create($request);
        Alert::success('Payment Success', 'Your payment is already proceed, check your email to get your ticket');
        return redirect(route('event'));
    }
}

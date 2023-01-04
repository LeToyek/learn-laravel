<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function show(){
        return view('events',[
            'title'=> 'events',
            'events' => Event::all(),
        ]);
    }
}

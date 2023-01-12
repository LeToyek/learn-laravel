<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.events.index', [
            'title' => 'Events',
            'events' => Event::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.events.create', [
            'title' => 'Create Event',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:events',
            'category_id' => 'required',
            'excerpt' => 'required',
            'price' => 'required|numeric',
            'event_date' => 'required|date_format:Y-m-d',
            'image' => 'image|file|max:2000',
            'stock' => 'required',
            'location' => 'required',
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        $validatedData['user_id'] = auth()->user()->id;

        Event::create($validatedData);
        Alert::success('Create Success', 'Your event is created');
        return redirect('/dashboard/events')->with('success', 'New event has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $soldTicket = Ticket::where('event_id',$event->id)->count();
        $event['max_ticket'] = $event->stock + $soldTicket;
        return view('dashboard.events.show', ['title' => 'event', 'event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('dashboard.events.edit', [
            'title' => 'Edit',
            'event' => $event,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:events',
            'category_id' => 'required',
            'excerpt' => 'required',
            'price' => 'required|numeric',
            'event_date' => 'required|date_format:Y-m-d',
            'image' => 'image|file|max:2000',
            'stock' => 'required',
            'location' => 'required',
        ]);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        $validatedData['user_id'] = auth()->user()->id;
        Event::where('id', $event->id)->update($validatedData);
        Alert::success('Create Success', 'Your event is created');
        return redirect('/dashboard/events')->with('success', 'An event has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
        if ($event->image) {
            Storage::delete($event->image);
        }
        Event::destroy($event->id);
        return redirect('/dashboard/events')->with('success', 'Event has been deleted!');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Event::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}

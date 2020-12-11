<?php

namespace App\Http\Controllers;

use App\Event;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Event::get(['title','start', 'end']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create', [
            'rooms' => Room::all(),
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
        // Validate the request...

        $event = new Event();
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->start = date('Y-m-d H:i:s', strtotime($request->input('start')));
        $event->end = date('Y-m-d H:i:s', strtotime($request->input('end')));
        $event->type = $request->input('type');
        $event->properties = $request->input('properties');
        $event->room_id = $request->input('room');
        $event->user_id = Auth::user()->id;

        $event->save();
        return redirect()->route('rooms.show', $request->input('room'))->with('status', 'successfully added new Event');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}

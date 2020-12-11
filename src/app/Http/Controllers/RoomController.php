<?php

namespace App\Http\Controllers;

use App\Floor;
use App\Room;
use App\Device;
use Illuminate\Http\Request;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use App\TokenStore\TokenCache;

class RoomController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('resources/workspaces/rooms.index', [
            'rooms' => Room::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resources/workspaces/rooms.create', [
            'floors'     => Floor::all(),
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

        $room = new Room();
        $room->name = $request->input('name');
        $room->doors = $request->input('num_doors');
        $room->windows = $request->input('num_windows');
        $room->capacity = $request->input('capacity');
        $room->description = $request->input('description');
        $room->floor_id = $request->input('floor');

        $room->save();
        return redirect()->route('rooms.show', $room)->with('status', 'successfully added new Room');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        $temperature_arr = json_decode(ApiController::getLatestTemperature($room));
        $humidity_arr = json_decode(ApiController::getLatestHumidity($room));
        $states_arr = json_decode(ApiController::getLatestState($room));
        return view('resources/workspaces/rooms.show', [
            //'room' => Room::findOrFail($room->id),
            'room'          => $room,
            'temperature'   => $temperature_arr[0]->value,
            'humidity'      => $humidity_arr[0]->value,
            'door'          => $states_arr[0]->value,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}

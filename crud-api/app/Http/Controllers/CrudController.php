<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Event;


class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::get();
        return response()->json([
            "success" => true,
            "message" => "Event List",
            "data" => $event
            ]);
       //return $event;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = $request->validate([
            'name' => 'required',
            'startAt' => 'required',
            'endAt' => 'required'
        ]);
        //dd($validator);

        // if($validator->fails()){
        //     return $this->sendError('Validation Error.' , $validator->errors());
        // }

        $event = new Event();
        $event->id = (string) Str::uuid();
        $event->name = $request->name;
        $event->startAt = $request->startAt;
        $event->endAt = $request->endAt;
        $event->save();

        return response()->json([
            "success" => true,
            "message" => "Event created succesfully",
            "data" => $event
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //dd('something');
        return $event;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //sad
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //dd($event);
        $validator = $request->validate([
            'name' => 'required',
            'startAt' => 'required',
            'endAt' => 'required'
        ]);
        //dd($event);

        $check = $event-> name == $request->name;
        if(!$check)
        {
          $event  = new Event();
          $event->id = (string) Str::uuid();
        }

        $event->name = $request->name;
        $event->startAt = $request->startAt;
        $event->endAt = $request->endAt;
        $event->save();

        return response()->json([
            "success" => true,
            "message" => "Event updated succesfully",
            "data" => $event
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json ([
            "success" => true,
            "message" => "Event deleted succesfully",
        ]);
    }

    public function activeEvents()
    {
        //dd('something');
        $event = Event::whereDate('startAt', '<=', date('Y-m-d'))
                ->whereDate('endAt', '>=', date('Y-m-d'))
                ->get();

        return response()->json([
            "success" => true,
            "data" => $event
        ]);
    }

}

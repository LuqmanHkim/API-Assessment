<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baseUrl = 'http://127.0.0.1:7802/api/v1/events';
        $client = new Client();
        $response = $client->request('GET', $baseUrl);
        $body = json_decode($response->getBody()->getContents());
        $events = $body->data;
       // $remainingBytes = $body->getContents();
        //$getData = json_decode($remainingBytes);
        //dd($events);

        return view('index', compact('events'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $baseUrl = 'http://127.0.0.1:7802/api/v1/events/';
        $client = new Client();
        $response = $client->request('POST', $baseUrl, [
            'json' => [
                'name' => $request->name,
                'startAt' => $request->startAt,
                'endAt' => $request->endAt
                ]
            ]);
        //dd($response);
        Log::Info('Events.Store');

        return redirect()->route('events.store')->with('message', 'Event Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $baseUrl = 'http://127.0.0.1:7802/api/v1/events';
        $client = new Client();
        $response = $client->request('GET', $baseUrl);
        $body = $response->getBody();
        $remainingBytes = $body->getContents();
        $events = json_decode($remainingBytes);

        return view('index', compact('events'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $baseUrl = 'http://127.0.0.1:7802/api/v1/events/'.$id;
        $client = new Client();
        $response = $client->request('GET', $baseUrl , [
            'header' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ],
        ]);

        $body = $response->getBody();
        $remainingBytes = $body->getContents();
        $events = json_decode($remainingBytes);

        //dd($events)

        return view('edit', compact('events'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $baseUrl = 'http://127.0.0.1:7802/api/v1/events/'.$id;
        $client = new Client();
        $response = $client->request('PUT', $baseUrl, [
            'json' => [
                'name' => $request->name,
                'startAt' => $request->startAt,
                'endAt' => $request->endAt
                ]
            ]);
        //dd($response);

        return redirect()->route('events.store')->with('message', 'Event Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baseUrl = "http://127.0.0.1:7802/api/v1/events/".$id;
        $client = new Client();
        //dd($id);
        $response = $client->delete($baseUrl);


        return redirect()->route('events.store')->with('message', 'Event Deleted Successfully!');
    }
}

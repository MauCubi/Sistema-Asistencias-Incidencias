<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreEventPost;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        //dd($empresas);

        return view("event/index");
    }

    public function indexper()
    {        
        //dd($empresas);

        return view("event/indexper");
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
    public function store(StoreEventPost $request)
    {
        // dd(Auth::user()->id);
        $user = Auth::user();
        // dd($user);

        $event = Event::create($request->all());
        
        $event->user_id = $user->id;
        $event->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {

    }

    public function mostrar(Event $event)
    {

        // $user = Auth::user();
        // $event = Event::where('user_id',$user->id)->get();

        $event = Event::all();
        return response()->json($event);
    }

    public function personal(Event $event)
    {

        $user = Auth::user();
        $event = Event::where('user_id',$user->id)->get();

       
        return response()->json($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);

        $event->start =  Carbon::createFromFormat('Y-m-d H:i:s', $event->start)->format('Y-m-d');
        $event->end =  Carbon::createFromFormat('Y-m-d H:i:s', $event->end)->format('Y-m-d');


        return response()->json($event);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEventPost $request, Event $event)
    {
        
        $event->update($request->all());
        return response()->json($event);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id)->delete();
        return response()->json($event);

    }
}

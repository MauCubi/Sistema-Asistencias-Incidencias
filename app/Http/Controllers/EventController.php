<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\TipoEvento;
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
        //Lleva a la vista de calendario con los tipos de eventos
        //En este caso no se hace como siempre que llevas los eventos
        //Ya que eso se hace con el controlador Mostrar y una linea en agenda.js
        $tipos = TipoEvento::where('general', true)->get();

        return view("event/index", ["tipos" => $tipos]);
    }

    public function indexper()
    {        
        //Igual que arriba, solo que trae tipos de eventos que son personales, hace falta control del usuario
        $tipos = TipoEvento::where('general', false)->get();
        return view("event/indexper", ["tipos" => $tipos]);
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

        //Almacenar el evento
        $user = Auth::user();
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

       //Trae y muestra en el calendario todos los eventos GENERALES

        $event = Event::all();
        return response()->json($event);
    }

    public function personal(Event $event)
    {
        //Trae y muestra en el calendario todos los eventos PERSONALES
        //Por ahora solo trae los del usuario, pero no personales, sino todos los que dio de alta el user
        //voy a arreglar en estos dias eso
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

        //editar evento
        $event = Event::find($id);
        $tipo = TipoEvento::find($event->id);

        // $evento = array(
        //     "id" => $event->id,
        //     "title" => $event->title,
        //     "description" => $event->description,
        //     "start" => $event->start,
        //     "end" => $event->end,
        //     "user_id" => $event->user_id,
        //     "tipo" => $tipo->id,
        // );

        $event->start =  Carbon::createFromFormat('Y-m-d H:i:s', $event->start)->format('Y-m-d');
        $event->end =  Carbon::createFromFormat('Y-m-d H:i:s', $event->end)->format('Y-m-d');


        //return response()->json($event);

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
        //actualizar evento
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
        //Eliminar evento
        $event = Event::find($id)->delete();
        return response()->json($event);

    }
}

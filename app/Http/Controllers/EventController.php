<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\Empleado;
use App\Models\TipoEvento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreEventPost;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{

    public function __construct(){
        $this->middleware('can:event.index')->only('index2','index3');
        $this->middleware('can:event.edit')->only('edit', 'update','edit2','update2','editar');
        $this->middleware('can:event.destroy')->only('destroy','destroy2');
        $this->middleware('can:event.create')->only('create', 'store','create2','store2');
        $this->middleware('can:event.show')->only('show','show2');
        $this->middleware('can:event.indexPersonal')->only('indexPersonal', 'allIndex');
        $this->middleware('can:event.showPersonal')->only('showPersonal');
        $this->middleware('can:event.calendario')->only('index','indexper','mostrar','personal');
    }
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
        return view("event.index", ["tipos" => $tipos]);
    }

    public function indexper()
    {        
        //Igual que arriba, solo que trae tipos de eventos que son personales, hace falta control del usuario
        $tipos = TipoEvento::where('general', false)->get();
        return view("event.indexper", ["tipos" => $tipos]);
    }

    public function indexPersonal()
    {   
        $user = Auth::user();     
        $events = Event::where('empleado_id', $user->id)->whereHas('tipoevento', function($q){
            $q->where('general', false);})->paginate(10);
            return view("event.indexpersonal",['events' => $events]);
    }

    public function index2()
    {        
        $events = Event::whereHas('tipoevento', function($q){
        $q->where('general', true);})->paginate(10);
        return view("event.index2",['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoeventos = TipoEvento::where('general', true)->get();
        return view("event.create",["event" => new Event(), "tipoeventos" => $tipoeventos]);

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
        $event = new Event();
        $event->title = $request->title;
        
        $event->description = $request->description;
        $event->tipoevento_id = $request->tipoevento_id;
        $event->start = $request->start;
        $fechinStart = Carbon::parse($request->start);
        $fechin = Carbon::parse($request->end);
        $fechin->setHour(23);
        if ($request->end == null) {
            $event->end = $request->start;
        }else{
            //$event->end = $request->end;
            $event->end = $fechin;
        }
        
        // if ($event->start->gt($event->end)) {
        //     return Redirect::to("event/create")->with('status','Fecha mal');
        // }

        if ($event->tipoevento->diasLimite != 0) {
            $diferencia = $fechin->diffInDays($fechinStart);
            $event->title = $diferencia;
            if ($diferencia >= $event->tipoevento->diasLimite) {
                return Redirect::back()->withInput()->with('error','Superado el limite de dias para el tipo de incidencia 
                (Max '.$event->tipoevento->diasLimite.' días) ');
            }           
        }

        $event->empleado_id = $user->empleado_id;
        $event->save();

        return Redirect::to("events")->with('status','Incidencia Creada Exitosamente');    

        // $event = Event::create($request->all());        
        // $event->user_id = $user->id;
        // $event->save();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view("event.show", ["event" => $event]);

    }

    public function showPersonal(Event $event)
    {
        return view("event.showpersonal", ["event" => $event]);

    }

    public function mostrar(Event $event)
    {

       //Trae y muestra en el calendario todos los eventos GENERALES

       $event = Event::whereHas('tipoevento', function($q){
        $q->where('general', true);})->get();
        return response()->json($event);
    }

    public function personal(Event $event)
    {
        //Trae y muestra en el calendario todos los eventos PERSONALES
        //Por ahora solo trae los del usuario, pero no personales, sino todos los que dio de alta el user
        //voy a arreglar en estos dias eso


        $user = Auth::user();
        $id = $user->empleado_id; 
        //$event = Event::where('empleado_id',$id)->get();

        $event = Event::whereHas('tipoevento', function($q){
            $q->where('general', false);})->where('empleado_id', $id)->get();

       
        return response()->json($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)   {

        $tipoeventos = TipoEvento::where('general', true)->get();


        return view("event.edit", ["event" => $event, "tipoeventos" => $tipoeventos]);

        
        //editar evento       
        // $evento = array(
        //     "id" => $event->id,
        //     "title" => $event->title,
        //     "description" => $event->description,
        //     "start" => $event->start,
        //     "end" => $event->end,
        //     "user_id" => $event->user_id,
        //     "tipo" => $tipo->id,
        // );

        //EDIT CALENDAR
        // $event = Event::find($id);
        // $tipo = TipoEvento::find($event->id);

        // $event->start =  Carbon::createFromFormat('Y-m-d H:i:s', $event->start)->format('Y-m-d');
        // $event->end =  Carbon::createFromFormat('Y-m-d H:i:s', $event->end)->format('Y-m-d');

        // return response()->json($event);

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
        $fechinStart = Carbon::parse($request->start);
        $fechin = Carbon::parse($request->end);

        if ($event->tipoevento->diasLimite != 0) {
            $diferencia = $fechin->diffInDays($fechinStart);
            $event->title = $diferencia;
            if ($diferencia >= $event->tipoevento->diasLimite) {
                return Redirect::back()->withInput()->with('error','Superado el limite de dias para el tipo de incidencia 
                (Max '.$event->tipoevento->diasLimite.' días) ');
            }           
        }
        
        $event->update($request->validated());
        return Redirect::to("events")->with('status','Incidencia Actualizada');   

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //Eliminar evento
        // $event = Event::find($event->id);
        $event->delete();
        return back()->with('status','Incidencia Eliminada');

    }


    public function editar($id)   {
        
        //editar evento       
        // $evento = array(
        //     "id" => $event->id,
        //     "title" => $event->title,
        //     "description" => $event->description,
        //     "start" => $event->start,
        //     "end" => $event->end,
        //     "user_id" => $event->user_id,
        //     "tipo" => $tipo->id,
        // );

        //EDIT CALENDAR
        $event = Event::find($id);
        $tipo = TipoEvento::find($event->id);

        $event->start =  Carbon::createFromFormat('Y-m-d H:i:s', $event->start)->format('Y-m-d');
        $event->end =  Carbon::createFromFormat('Y-m-d H:i:s', $event->end)->format('Y-m-d');

        return response()->json($event);

    }



    //CONTROLLERS DE INCIDENCIAS PERSONALES

    public function index3()
    {        

        // $user = Auth::user();
        $events = Event::whereHas('tipoevento', function($q){
        $q->where('general', false);})->get();
        return view("event.index3",['events' => $events]);
    }

    public function create2()
    {
        $tipoeventos = TipoEvento::where('general', false)->get();
        $empleados = Empleado::get();
        return view("event.create2",["event" => new Event(), "tipoeventos" => $tipoeventos, "empleados" => $empleados]);

    }


    public function store2(StoreEventPost $request)
    {               
        //Almacenar el evento
        //$user = Auth::user();
        $event = new Event();
        $event->title = $request->title;
        
        $event->description = $request->description;
        $event->tipoevento_id = $request->tipoevento_id;
        $event->start = $request->start;
        $fechinStart = Carbon::parse($request->start);
        $fechin = Carbon::parse($request->end);
        $fechin->setHour(23);
        if ($request->end == null) {
            $event->end = $request->start;
        }else{
            //$event->end = $request->end;
            $event->end = $fechin;
        }

        if ($event->tipoevento->diasLimite != 0) {
            $diferencia = $fechin->diffInDays($fechinStart);
            $event->title = $diferencia;
            if ($diferencia >= $event->tipoevento->diasLimite) {
                return Redirect::back()->withInput()->with('error','Superado el limite de dias para el tipo de incidencia 
                (Max '.$event->tipoevento->diasLimite.' días) ');
            }           
        }

        $event->empleado_id = $request->empleado_id;
        $event->save();

        return Redirect::to("events2")->with('status','Incidencia Creada Exitosamente');    
        
    }

    public function show2(Event $event)
    {
        return view("event.show2", ["event" => $event]);

    }


    public function edit2(Event $event)   {

        $tipoeventos = TipoEvento::where('general', false)->get();
        $empleados = Empleado::get();
        return view("event.edit2", ["event" => $event, "tipoeventos" => $tipoeventos, "empleados" => $empleados]);
    }

    public function update2(StoreEventPost $request, Event $event)
    {
        //actualizar evento
        $fechinStart = Carbon::parse($request->start);
        $fechin = Carbon::parse($request->end);

        if ($event->tipoevento->diasLimite != 0) {
            $diferencia = $fechin->diffInDays($fechinStart);
            $event->title = $diferencia;
            if ($diferencia >= $event->tipoevento->diasLimite) {
                return Redirect::back()->withInput()->with('error','Superado el limite de dias para el tipo de incidencia 
                (Max '.$event->tipoevento->diasLimite.' días) ');
            }           
        }

        $event->update($request->validated());
        return Redirect::to("events2")->with('status','Incidencia Actualizada');   

    }

    public function destroy2(Event $event)
    {
        //Eliminar evento  
        $event->delete();
        return back()->with('status','Incidencia Eliminada');

    }

    public function allIndex(){
        $events = Event::whereHas('tipoevento', function($q){
            $q->where('general', true);})->paginate(10);
            return view("event.index_all",['events' => $events]);
    }

    public function showAll(Event $event)
    {
        return view("event.show_all", ["event" => $event]);

    }




}

<?php

namespace App\Http\Controllers;

use App\Models\TipoEvento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreTipoEventoPost;

class TipoEventoController extends Controller
{
    public function __construct(){
        $this->middleware('can:tipoevento.index')->only('index');
        $this->middleware('can:tipoevento.edit')->only('edit', 'update');
        $this->middleware('can:tipoevento.destroy')->only('destroy');
        $this->middleware('can:tipoevento.create')->only('create', 'store');
        $this->middleware('can:tipoevento.show')->only('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoeventos = TipoEvento::orderBy('created_at','desc')->paginate(10);
        return view("tipoevento/index",['tipoeventos' => $tipoeventos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("tipoevento/create",["tipoevento" => new TipoEvento()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoEventoPost $request)
    {

        $tipoevento = new TipoEvento();
        $tipoevento->nombre = $request->nombre;

        if ($request->has('general')) {
            $tipoevento->general = true;
        }else{
            $tipoevento->general = false;
        }

        if ($request->has('descuento')) {
            $tipoevento->descuento = true;
        }else{
            $tipoevento->descuento = false;
        }

        if ($request->has('laboral')) {
            $tipoevento->noLaboral = true;
        }else{
            $tipoevento->noLaboral = false;
        }

        $tipoevento->save();
        
        return Redirect::to("tipoevento")->with('status','Tipo de Incidencia Creado Exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoEvento  $tipoEvento
     * @return \Illuminate\Http\Response
     */
    public function show(TipoEvento $tipoevento)
    {
        return view("tipoevento.show", ["tipoevento" => $tipoevento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoEvento  $tipoEvento
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoEvento $tipoevento)
    {
        return view("tipoevento.edit", ["tipoevento" => $tipoevento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoEvento  $tipoEvento
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTipoEventoPost $request, TipoEvento $tipoevento)
    {
        $tipoevento->nombre = $request->nombre;

        if ($request->has('general')) {
            $tipoevento->general = true;
        }else{
            $tipoevento->general = false;
        }

        if ($request->has('descuento')) {
            $tipoevento->descuento = true;
        }else{
            $tipoevento->descuento = false;
        }

        if ($request->has('laboral')) {
            $tipoevento->noLaboral = true;
        }else{
            $tipoevento->noLaboral = false;
        }

        $tipoevento->save();

        return Redirect::to("tipoevento")->with('status','Tipo de Incidencia Actualizado Exitosamente');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoEvento  $tipoEvento
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoEvento $tipoevento)
    {
        if($tipoevento->events->count() == 0){
            $tipoevento->delete();
            return back()->with('status','Tipo de Incidencia Eliminado');
        }else{
            return back()->with('error','No puede eliminarse el horario ya que tiene información asociada'); 
        }
    }
}

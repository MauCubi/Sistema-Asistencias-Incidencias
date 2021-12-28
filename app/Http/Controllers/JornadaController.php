<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Jornada;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJornadaPost;

class JornadaController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function show(Jornada $jornada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function edit(Jornada $jornada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jornada $jornada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jornada $jornada)
    {
        $jornada->delete();
        return back()->with('status','Jornada Eliminada');
    }


    public function add(StoreJornadaPost $request, $horario)
    {
        $hor = Horario::find($horario);
        $jornada = new Jornada;
        $jornada->entrada = $request->entrada;
        $jornada->salida = $request->salida;

        if ($jornada->entrada < '12:00') {
            $jornada->periodo = true;
        }else{
            $jornada->periodo = false; 
        }
 

        $jornada->horario_id = $hor->id;

        $jornada->save();

        //return view("horario.show", ["horario" => $hor]);

        return redirect()->route('horario.show', ["horario" => $hor]);

        
    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Asistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $asistencias = Asistencia::where('empleado_id', $user->empleado_id)->get();
        
        //dd($asistencias[0]->id);

        return view('asistencia.index', compact('asistencias'));
        
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
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    // public function show( $id)
    {
        $asistencia = Asistencia::find($id);

        //$empleado = $asistencia->empleado()->first();

        //dd($empleado);

        return view('asistencia.show',['asistencia' => $asistencia]);
        //dd($asistencia);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asistencia $asistencia)
    {
        //
    }

    public function marcar()
    {
        $asistencia = Asistencia::where('verify', true)->first();

        if ($asistencia == null) {
            return view("asistencia/marcar");
        }else{
            return view("asistencia/marcar", ['asistencia' => $asistencia]);
        }
    }

    public function add()
    {
        $asistencia = Asistencia::where('verify', true)->first();
        $now = Carbon::now('GMT-3');
        $nowtitle = Carbon::now('GMT-3')->format('d-m-Y');

        if ($asistencia == null) {
            $asistencia = new Asistencia();            
            $user = Auth::user();            
            $asistencia->title = 'Asistencia'.' '.$nowtitle;
            $asistencia->verify = true;
            
            $asistencia->start = $now;
            $asistencia->end = $now;
            $asistencia->hora = 0;
            $asistencia->minuto = 0;
            
            $asistencia->tipoasistencia_id = 1;
            $asistencia->empleado_id = $user->empleado_id;
    
            $asistencia->save();
    
            return Redirect::to("asistencia/marcar")->with('status','Entrada Marcada');
        }else{

            $asistencia->verify = false;
            $asistencia->end = $now;

            //TESTEO DE CALCULO
            // $datetime = new Carbon('2021-11-27 19:53:50');
            // $asistencia->end = $datetime;

            $time = new Carbon($asistencia->start);

            $asistencia->hora = $time->diffInHours($asistencia->end);
            $asistencia->minuto = $time->diffInMinutes($asistencia->end);

            if ($asistencia->hora != 0) {
                $asistencia->minuto = $asistencia->minuto - (60 * $asistencia->hora);
            }
            

            $asistencia->save();




            return Redirect::to("asistencia/marcar")->with('status','Salida Marcada');

        }


    }
}

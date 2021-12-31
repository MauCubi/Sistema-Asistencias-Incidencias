<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Jornada;
use App\Models\Asistencia;
use Illuminate\Http\Request;
use App\Models\IncidenciaHoraria;
use Illuminate\Support\Facades\Auth;

class IncidenciaHorariaController extends Controller
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
     * @param  \App\Models\IncidenciaHoraria  $incidenciaHoraria
     * @return \Illuminate\Http\Response
     */
    public function show(IncidenciaHoraria $incidenciaHoraria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncidenciaHoraria  $incidenciaHoraria
     * @return \Illuminate\Http\Response
     */
    public function edit(IncidenciaHoraria $incidenciaHoraria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IncidenciaHoraria  $incidenciaHoraria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncidenciaHoraria $incidenciaHoraria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncidenciaHoraria  $incidenciaHoraria
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncidenciaHoraria $incidenciaHoraria)
    {
        //
    }

    public function add()
    {
        $user = Auth::user();
        $now = Carbon::now('GMT-3');
        $nowtitle = Carbon::now('GMT-3')->format('Y-m-d');


        switch ($now->englishDayOfWeek) {
            case 'Monday':
                $jornadas = Jornada::where('horario_id', $user->empleado->horario_id)->where('isLunes', true)->get();
                break;
            case 'Tuesday':
                $jornadas = Jornada::where('horario_id', $user->empleado->horario_id)->where('isMartes', true)->get();
                break;
            case 'Wednesday':
                $jornadas = Jornada::where('horario_id', $user->empleado->horario_id)->where('isMiercoles', true)->get();
                break;
            case 'Thursday':
                $jornadas = Jornada::where('horario_id', $user->empleado->horario_id)->where('isJueves', true)->get();
                break;
            case 'Friday':
                $jornadas = Jornada::where('horario_id', $user->empleado->horario_id)->where('isViernes', true)->get();
                break;
            case 'Saturday':
                $jornadas = Jornada::where('horario_id', $user->empleado->horario_id)->where('isSabado', true)->get();
                break;
            case 'Sunday':
                $jornadas = Jornada::where('horario_id', $user->empleado->horario_id)->where('isDomingo', true)->get();
                break;

        }

        //dd($nowtitle);
        $asistencias = Asistencia::whereDate('start', $nowtitle)->where('empleado_id',$user->empleado_id)->get();

        //dd(count($asistencias));

        $j = count($jornadas);
        $a = count($asistencias);

        if($j != $a){
            $c = $j - $a;
            for($i = 0 ; $i < $c ; $i++){
                $inasistencia = new IncidenciaHoraria;                
                $inasistencia->fecha = $nowtitle;
                $inasistencia->tipo = 'Inasistencia';
                $inasistencia->justificacion = false;
                $inasistencia->descripcion = 'Inasistencia';
                $inasistencia->empleado_id = $user->empleado_id;
                $inasistencia->save();  
            }
        }

    }
}

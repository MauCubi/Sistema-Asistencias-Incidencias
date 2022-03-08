<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Jornada;
use App\Models\Asistencia;
use Illuminate\Http\Request;
use App\Models\IncidenciaHoraria;
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
            return view("asistencia.marcar");
        }else{
            return view("asistencia.marcar", ['asistencia' => $asistencia]);
        }
        
    }

    public function add()
    {
        
        $asistencia = Asistencia::where('verify', true)->first();
        $now = Carbon::now('GMT-3');
        $nowtitle = Carbon::now('GMT-3')->format('d-m-Y');
        $user = Auth::user();
        $horita = Carbon::now('GMT-3')->format('H:i:s');

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

        //dd(count($jornadas));

        if($jornadas->isEmpty()){
            return Redirect::to("asistencia/marcar")->with('status','No se encontraron horarios para este dia');        
        }

        $comparar = null;

        if ($asistencia == null) {
            $asistencia = new Asistencia();

            foreach ($jornadas as $j) {
                $newdate = new Carbon($j->entrada);            
                if( $comparar == null | $comparar >= $newdate->diffInMinutes($horita))
                {
                    $jornada = $j;
                    $comparar = $newdate->diffInMinutes($horita);                
                }
            }

            $asistencia->title = 'Asistencia'.' '.$nowtitle;
            
            if($horita > $jornada->entrada && $comparar > $jornada->horario->tolerancia){                
                    $asistencia->isLate = true;
                    //Crear incidencia horaria
                    $tarde = new IncidenciaHoraria;
                    $tarde->fecha = $now;
                    $tarde->tipo = 'Tardanza';
                    $tarde->justificacion = false;
                    $tarde->descripcion = 'Tarde por '.$comparar.' minutos';
                    $tarde->empleado_id = $user->empleado_id;
                    $tarde->save();                
            }
            
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

            foreach ($jornadas as $j) {
                $newdate = new Carbon($j->salida);            
                if( $comparar == null | $comparar >= $newdate->diffInMinutes($horita))
                {
                    $jornada = $j;
                    $comparar = $newdate->diffInMinutes($horita);                
                }
            }

            //TESTEO DE CALCULO
            // $datetime = new Carbon('2021-11-27 19:53:50');
            // $asistencia->end = $datetime;

            if($horita < $jornada->salida && $comparar > $jornada->horario->tolerancia)
            {    
                $asistencia->isEarly = true;
                //Crear incidencia horaria
                $temprano = new IncidenciaHoraria;
                $temprano->fecha = $now;
                $temprano->tipo = 'Retiro Temprano';
                $temprano->justificacion = false;
                $temprano->descripcion = 'Retiro temprano por '.$comparar.' minutos';
                $temprano->empleado_id = $user->empleado_id;
                $temprano->save();                      
            }

            $time = new Carbon($asistencia->start);
            $asistencia->hora = $time->diffInHours($asistencia->end);
            $asistencia->minuto = $time->diffInMinutes($asistencia->end);

            if ($asistencia->hora != 0) 
            {
                $asistencia->minuto = $asistencia->minuto - (60 * $asistencia->hora);
            }            

            $asistencia->save();

            return Redirect::to("asistencia/marcar")->with('status','Salida Marcada');

        }

    }
}

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
use App\Models\Empleado;

class AsistenciaController extends Controller
{

    public function __construct(){
        $this->middleware('can:asistencia.index')->only('indexAll');
        $this->middleware('can:asistencia.edit')->only('edit', 'update');
        $this->middleware('can:asistencia.destroy')->only('destroy');
        $this->middleware('can:asistencia.create')->only('create', 'store');
        $this->middleware('can:asistencia.show')->only('show');
        $this->middleware('can:asistencia.personal')->only('index', 'marcar', 'add');
        //$this->middleware('can:incidenciahoraria.marcarAsistencia')->only('add');
    }
    /**
     * Este index muestra las asistencias de la PERSONA logueada.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $asistencias = Asistencia::where('empleado_id', $user->empleado_id)->orderBy('created_at','desc')->paginate(10);
        
        //dd($asistencias[0]->id);

        return view('asistencia.index', compact('asistencias'));
        
    }

    /**
     * Este index es para mostrar las asistencias de TODOS los empleados.
     */
    public function indexAll(){
        $user = auth()->user();
        $asistencias = Asistencia::orderBy('created_at','desc')->paginate(10);

        return view('asistencia.indexall',compact('asistencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = Empleado::all();

        return view('asistencia.create',compact('empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'start' => 'required',
                'end'   => 'required|after_or_equal:start'
            ],
            [
                'end.after_or_equal'=> 'La fecha de salida debe ser posterior a la de entrada',
            ]
        );

        $empleado = Empleado::find($request->empleado_id);
        $asistencia = new Asistencia;

        //Transformo a string la fecha y armo el titulo
        $date = "Asistencia"." ".date('d-m-Y',strtotime($request->start));
        $asistencia->title = $date;
        $asistencia->verify = 0;
        $asistencia->verify = true;            
        $asistencia->start = $request->start;
        $asistencia->end = $request->end;

        //Calculo de cantidad de tiempo trabajado
        $time = new Carbon($request->start);
        $asistencia->hora = $time->diffInHours($request->end);
        $asistencia->minuto = $time->diffInMinutes($request->end);

        if ($asistencia->hora != 0) 
        {
            $asistencia->minuto = $asistencia->minuto - (60 * $asistencia->hora);
        }    

        // Asocio las claves foraneas 
        $asistencia->tipoasistencia_id = 1;
        $asistencia->empleado_id = $empleado->id;
        $asistencia->empleado()->associate($empleado);   
        $asistencia->save();

        return Redirect::to("lista-asistencias")->with('status','Asistencia cargada');
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

        return view('asistencia.show',['asistencia' => $asistencia]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistencia $asistencia)
    {
        //dd(date('d-m-Y',strtotime($asistencia->start)));
        
        $empleados =Empleado::all();

        return view('asistencia.edit',['asistencia'=>$asistencia,'empleados'=>$empleados]);
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
        $this->validate(
            $request,
            [
                'start' => 'required',
                'end'   => 'required|after_or_equal:start'
            ],
            [
                'end.after_or_equal'=> 'La fecha de salida debe ser posterior a la de entrada',
            ]
        );
        
        $empleado = Empleado::find($request->empleado_id);

        //Transformo a string la fecha y armo el titulo
        $date = "Asistencia"." ".date('d-m-Y',strtotime($request->start));
        $asistencia->title = $date;
        $asistencia->verify = 0;
        $asistencia->verify = true;            
        $asistencia->start = $request->start;
        $asistencia->end = $request->end;

        //Calculo de cantidad de tiempo trabajado
        $time = new Carbon($request->start);
        $asistencia->hora = $time->diffInHours($request->end);
        $asistencia->minuto = $time->diffInMinutes($request->end);

        if ($asistencia->hora != 0) 
        {
            $asistencia->minuto = $asistencia->minuto - (60 * $asistencia->hora);
        }    

        // Asocio las claves foraneas 
        $asistencia->tipoasistencia_id = 1;
        $asistencia->empleado_id = $empleado->id;
        $asistencia->empleado()->associate($empleado);   
        $asistencia->save();

        return Redirect::to("lista-asistencias")->with('status','Asistencia editada');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asistencia $asistencia)
    {
        $asistencia->delete();
        return back()->with('status','Asistencia Eliminada');
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

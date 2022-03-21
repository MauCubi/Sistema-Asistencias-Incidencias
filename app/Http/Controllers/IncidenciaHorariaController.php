<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Jornada;
use App\Models\Empleado;
use App\Models\Asistencia;
use Illuminate\Http\Request;
use App\Models\IncidenciaHoraria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class IncidenciaHorariaController extends Controller
{
    public function __construct(){
        $this->middleware('can:incidenciahoraria.index')->only('index');
        $this->middleware('can:incidenciahoraria.edit')->only('edit', 'update');
        $this->middleware('can:incidenciahoraria.destroy')->only('destroy');
        $this->middleware('can:incidenciahoraria.create')->only('create', 'store');
        $this->middleware('can:incidenciahoraria.show')->only('show');
        $this->middleware('can:incidenciahoraria.personal')->only('indexPersonal', 'personal');
        $this->middleware('can:incidenciahoraria.marcarAsistencia')->only('add');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($flag)
    {
        $user = Auth::user();
        switch ($flag) {
            case 1:
                $incidenciashorarias = IncidenciaHoraria::orderBy('created_at','desc')->where('tipo', 'Tardanza')->paginate(10);
                return view("incidenciahoraria/tardanza/index",['incidenciashorarias' => $incidenciashorarias]);
                break;
            case 2:
                $incidenciashorarias = IncidenciaHoraria::orderBy('created_at','desc')->where('tipo', 'Retiro Temprano')->paginate(10);
                return view("incidenciahoraria/temprano/index",['incidenciashorarias' => $incidenciashorarias]);
                break;
            case 3:
                $incidenciashorarias = IncidenciaHoraria::orderBy('created_at','desc')->where('tipo', 'Inasistencia')->paginate(10);
                return view("incidenciahoraria/inasistencia/index",['incidenciashorarias' => $incidenciashorarias]);
                break;              
            
            default:
                # code...
                break;
        }
    }

    public function indexPersonal($flag)
    {
        $user = Auth::user();
        switch ($flag) {            
            case 4:
                $incidenciashorarias = IncidenciaHoraria::orderBy('created_at','desc')->where('tipo', 'Tardanza')
                ->where('empleado_id', $user->id )->paginate(10);
                return view("incidenciahoraria/tardanza/index_personal",['incidenciashorarias' => $incidenciashorarias]);
                break;
            case 5:
                $incidenciashorarias = IncidenciaHoraria::orderBy('created_at','desc')->where('tipo', 'Retiro Temprano')
                ->where('empleado_id', $user->id )->paginate(10);
                return view("incidenciahoraria/temprano/index_personal",['incidenciashorarias' => $incidenciashorarias]);
                break;
            case 6:
                $incidenciashorarias = IncidenciaHoraria::orderBy('created_at','desc')->where('tipo', 'Inasistencia')
                ->where('empleado_id', $user->id )->paginate(10);
                return view("incidenciahoraria/inasistencia/index_personal",['incidenciashorarias' => $incidenciashorarias]);
                break;    
            
            default:
                # code...
                break;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($flag)
    {
        $empleados = Empleado::get();

        switch ($flag) {
            case 1:
                return view("incidenciahoraria/tardanza/create",["incidenciahoraria" => new IncidenciaHoraria(), "empleados" => $empleados]);
                break;
            case 2:
                return view("incidenciahoraria/temprano/create",["incidenciahoraria" => new IncidenciaHoraria(), "empleados" => $empleados]);
                break;
            case 3:
                return view("incidenciahoraria/inasistencia/create",["incidenciahoraria" => new IncidenciaHoraria(), "empleados" => $empleados]);
                break;
            
            default:
                # code...
                break;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $incidencia = new IncidenciaHoraria();
        $incidencia->empleado_id = $request->empleado_id;
        $incidencia->fecha = $request->fecha;
        $incidencia->descripcion = $request->descripcion;
        if ($request->has('justificacion')) {
            $incidencia->justificacion = true;
        }else {
            $incidencia->justificacion = false;
        }
        switch ($request->tipo) {
            case 'Tardanza':     
                $incidencia->tipo = $request->tipo;
                $incidencia->save();            
                return Redirect::to("incidencia-horaria/index/1")->with('status','Tardanza Creada Exitosamente'); 
                break;
            case 'Retiro Temprano':
                $incidencia->tipo = $request->tipo;
                $incidencia->save();  
                return Redirect::to("incidencia-horaria/index/2")->with('status','Retiro Temprano Creado Exitosamente'); 
                break;
            case 'Inasistencia':
                $incidencia->tipo = $request->tipo;
                $incidencia->save();  
                return Redirect::to("incidencia-horaria/index/3")->with('status','Inasistencia Creada Exitosamente'); 
                break;
            
            default:
                # code...
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncidenciaHoraria  $incidenciaHoraria
     * @return \Illuminate\Http\Response
     */
    public function show(IncidenciaHoraria $incidenciahoraria)
    {
        switch ($incidenciahoraria->tipo) {
            case 'Tardanza':                         
                return view("incidenciahoraria.tardanza.show", ["incidenciahoraria" => $incidenciahoraria]);
                break;
            case 'Retiro Temprano':               
                return view("incidenciahoraria.temprano.show", ["incidenciahoraria" => $incidenciahoraria]);
                break;
            case 'Inasistencia':               
                return view("incidenciahoraria.inasistencia.show", ["incidenciahoraria" => $incidenciahoraria]);
                break;
        }
    }

    public function personal(IncidenciaHoraria $incidenciahoraria)
    {
        switch ($incidenciahoraria->tipo) {
            case 'Tardanza':                         
                return view("incidenciahoraria.tardanza.show_personal", ["incidenciahoraria" => $incidenciahoraria]);
                break;
            case 'Retiro Temprano':               
                return view("incidenciahoraria.temprano.show_personal", ["incidenciahoraria" => $incidenciahoraria]);
                break;
            case 'Inasistencia':               
                return view("incidenciahoraria.inasistencia.show_personal", ["incidenciahoraria" => $incidenciahoraria]);
                break;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncidenciaHoraria  $incidenciaHoraria
     * @return \Illuminate\Http\Response
     */
    public function edit(IncidenciaHoraria $incidenciahoraria)
    {
        $empleados = Empleado::get();
        switch ($incidenciahoraria->tipo) {
            case 'Tardanza':                         
                return view("incidenciahoraria.tardanza.edit",["incidenciahoraria" => $incidenciahoraria, "empleados" => $empleados]);
                break;
            case 'Retiro Temprano':               
                return view("incidenciahoraria.temprano.edit",["incidenciahoraria" => $incidenciahoraria, "empleados" => $empleados]); 
                break;
            case 'Inasistencia':               
                return view("incidenciahoraria.inasistencia.edit",["incidenciahoraria" => $incidenciahoraria, "empleados" => $empleados]); 
                break;
        }
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IncidenciaHoraria  $incidenciaHoraria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncidenciaHoraria $incidenciahoraria)
    {
        $incidenciahoraria->empleado_id = $request->empleado_id;
        $incidenciahoraria->fecha = $request->fecha;
        $incidenciahoraria->descripcion = $request->descripcion;
        if ($request->has('justificacion')) {
            $incidenciahoraria->justificacion = true;
        }else {
            $incidenciahoraria->justificacion = false;
        }

        switch ($request->tipo) {
            case 'Tardanza':                 
                $incidenciahoraria->update();            
                return Redirect::to("incidencia-horaria/index/1")->with('status','Tardanza Actualizada Exitosamente'); 
                break;
            case 'Retiro Temprano':
                $incidenciahoraria->update();  
                return Redirect::to("incidencia-horaria/index/2")->with('status','Retiro Temprano Actualizado Exitosamente'); 
                break;
            case 'Inasistencia':
                $incidenciahoraria->update();  
                return Redirect::to("incidencia-horaria/index/3")->with('status','Inasistencia Actualizada Exitosamente'); 
                break;
            
            default:
                # code...
                break;
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncidenciaHoraria  $incidenciaHoraria
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncidenciaHoraria $incidenciahoraria)
    {
        $tipo = $incidenciahoraria->tipo;
        $incidenciahoraria->delete();
        
        switch ($tipo) {
            case 'Tardanza':                 
                return back()->with('status','Tardanza Eliminada');
                break;
            case 'Retiro Temprano':
                return back()->with('status','Retiro Temprano Eliminado');
                break;
            case 'Inasistencia':
                return back()->with('status','Inasistencia Eliminada');
                break;
            
            default:
                # code...
                break;
        }
    }

    public function add()
    {
        $user = Auth::user();
        $now = Carbon::now('GMT-3');
        $nowtitle = Carbon::now('GMT-3')->format('Y-m-d');


        $empleados = Empleado::all();
        
        foreach ($empleados as $empleado) {
            switch ($now->englishDayOfWeek) {
                case 'Monday':
                    $jornadas = Jornada::where('horario_id', $empleado->horario_id)->where('isLunes', true)->get();
                    break;
                case 'Tuesday':
                    $jornadas = Jornada::where('horario_id', $empleado->horario_id)->where('isMartes', true)->get();
                    break;
                case 'Wednesday':
                    $jornadas = Jornada::where('horario_id', $empleado->horario_id)->where('isMiercoles', true)->get();
                    break;
                case 'Thursday':
                    $jornadas = Jornada::where('horario_id', $empleado->horario_id)->where('isJueves', true)->get();
                    break;
                case 'Friday':
                    $jornadas = Jornada::where('horario_id', $empleado->horario_id)->where('isViernes', true)->get();
                    break;
                case 'Saturday':
                    $jornadas = Jornada::where('horario_id', $empleado->horario_id)->where('isSabado', true)->get();
                    break;
                case 'Sunday':
                    $jornadas = Jornada::where('horario_id', $empleado->horario_id)->where('isDomingo', true)->get();
                    break;
    
            }

            $asistencias = Asistencia::whereDate('start', $nowtitle)->where('empleado_id', $empleado->id)->get();

            $j = count($jornadas);
            $a = count($asistencias);
    
            if($j != $a){
                $c = $j - $a;
                for($i = 0 ; $i < $c ; $i++){
                    $inasistencia = new IncidenciaHoraria;                
                    $inasistencia->fecha = $nowtitle;
                    $inasistencia->tipo = 'Inasistencia';
                    $inasistencia->justificacion = false;
                    $inasistencia->descripcion = '';
                    $inasistencia->empleado_id = $empleado->id;
                    $inasistencia->save();  
                }
            }


        }


        //dd($nowtitle);
        

        //dd(count($asistencias));



    }
}

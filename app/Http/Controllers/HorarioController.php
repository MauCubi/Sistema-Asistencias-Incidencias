<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Jornada;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\CategoriaHorario;
use App\Http\Requests\StoreHorarioPost;
use Illuminate\Support\Facades\Redirect;

class HorarioController extends Controller
{

    public function __construct(){
        $this->middleware('can:horario.index')->only('index');
        $this->middleware('can:horario.edit')->only('edit', 'update');
        $this->middleware('can:horario.destroy')->only('destroy');
        $this->middleware('can:horario.create')->only('create', 'store');
        $this->middleware('can:horario.show')->only('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horarios = Horario::orderBy('created_at','desc')->paginate(10);
        return view("horario/index",['horarios' => $horarios]);
    }

    public function indexPersonal()
    {
        $user = auth()->user();
        $empleado = Empleado::find($user->empleado_id);
        $horario = $empleado->horario()->first();
        $jornadas = Jornada::where('horario_id',$horario->id)->get();
        
        //Obtengo todos los horarios del empleado
        $lunes = collect([]);
        foreach ($jornadas as $jornada){
            if($jornada->isLunes){
                $lunes->push($jornada);
            }
        }

        $martes = collect([]);
        foreach ($jornadas as $jornada){
            if($jornada->isMartes){
                $martes->push($jornada);
            }
        }

        $miercoles = collect([]);
        foreach ($jornadas as $jornada){
            if($jornada->isMiercoles){
                $miercoles->push($jornada);
            }
        }

        $jueves = collect([]);
        foreach ($jornadas as $jornada){
            if($jornada->isJueves){
                $jueves->push($jornada);
            }
        }

        $viernes = collect([]);
        foreach ($jornadas as $jornada){
            if($jornada->isViernes){
                $viernes->push($jornada);
            }
        }

        $sabado = collect([]);
        foreach ($jornadas as $jornada){
            if($jornada->isSabado){
                $sabado->push($jornada);
            }
        }

        $domingo = collect([]);
        foreach ($jornadas as $jornada){
            if($jornada->isDomingo){
                $domingo->push($jornada);
            }
        }
        //return view("horario/listaHorarioPersonal",['horario' => $horario, 'jornadas' => $jornadas]);
        return view("horario/listaHorarioPersonal",['jornadas'=>$jornadas, 'lunes' => $lunes, 'martes' => $martes, 'miercoles' => $miercoles, 'jueves' => $jueves,'viernes' => $viernes,'sabado' => $sabado,'domingo' => $domingo ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = CategoriaHorario::get();

        return view("horario/create",["horario" => new Horario(), "categorias" => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHorarioPost $request)
    {
        Horario::create($request->validated());
        return Redirect::to("horario")->with('status','Horario Creado Exitosamente');    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show(Horario $horario)
    {
        return view("horario.show", ["horario" => $horario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function edit(Horario $horario)    {
        
        $categorias = CategoriaHorario::get();
        return view("horario.edit", ["horario" => $horario, "categorias" => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function update(StoreHorarioPost $request, Horario $horario)
    {
        $horario->update($request->validated());
        return Redirect::to("horario")->with('status','Horario Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horario $horario)
    {
        if($horario->empleados->count() == 0){
            foreach ($horario->jornadas as $jornada) {
                $jornada->delete();
            }            
            $horario->delete();
            return back()->with('status','Horario Eliminado');
        }else{
            return back()->with('error','No puede eliminarse el horario ya que tiene información asociada'); 
        }
    }
}

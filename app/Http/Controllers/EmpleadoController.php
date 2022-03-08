<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use App\Models\Horario;
use App\Models\Empleado;
use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmpleadoPost;
use Illuminate\Support\Facades\Redirect;

class EmpleadoController extends Controller
{
    public function __construct(){
        $this->middleware('can:empleado.index')->only('index');
        $this->middleware('can:empleado.edit')->only('edit', 'update');
        $this->middleware('can:empleado.destroy')->only('destroy');
        $this->middleware('can:empleado.create')->only('create', 'store');
        $this->middleware('can:empleado.show')->only('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::orderBy('created_at','desc')->paginate(10);
        return view("empleado.index",['empleados' => $empleados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $puestos = Puesto::get();
        $departamentos = Departamento::get();
        $horarios = Horario::get();

        return view("empleado/create",["empleado" => new Empleado(), "puestos" => $puestos,"departamentos" => $departamentos, "horarios" => $horarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmpleadoPost $request)
    {
        Empleado::create($request->validated());        
        
        return Redirect::to("empleado")->with('status','Empleado Creado Exitosamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        return view("empleado.show", ["empleado" => $empleado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        $puestos = Puesto::get();
        $departamentos = Departamento::get();
        $horarios = Horario::get();
        $puestoid = Puesto::where('id',$empleado->puesto_id)->first();
        return view("empleado.edit", ["empleado" => $empleado, "puestos" => $puestos,"departamentos" => $departamentos, "puestoid" => $puestoid, "horarios" => $horarios]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmpleadoPost $request, Empleado $empleado)
    {
        $empleado->update($request->validated());
        return Redirect::to("empleado")->with('status','Empleado Actualizado');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->alta = false;
        $empleado->save();
        return back()->with('status','Empleado Dado de Baja');
    }


    public function createfind(Request $request)
    {
        $data = Puesto::select('id', 'nombre')->where('departamento_id', $request->id)->get();

        return response()->json($data);
    }


}

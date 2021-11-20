<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmpleadoPost;
use Illuminate\Support\Facades\Redirect;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::orderBy('created_at','desc')->paginate(10);
        return view("empleado/index",['empleados' => $empleados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $puestos = Puesto::get();

        return view("empleado/create",["empleado" => new Empleado(), "puestos" => $puestos]);
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
        return view("empleado.edit", ["empleado" => $empleado, "puestos" => $puestos]); 
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
}

<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Http\Requests\StorePuestoPost;
use Illuminate\Support\Facades\Redirect;

class PuestoController extends Controller
{
    public function __construct(){
        $this->middleware('can:puesto.admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puestos = Puesto::orderBy('departamento_id')->paginate(10);
        return view("puesto/index",['puestos' => $puestos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::get();

        return view("puesto/create",["puesto" => new Puesto(), "departamentos" => $departamentos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePuestoPost $request)
    {
        Puesto::create($request->validated());        
        return Redirect::to("puesto")->with('status','Puesto Creado Exitosamente'); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function show(Puesto $puesto)
    {
        return view("puesto.show", ["puesto" => $puesto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function edit(Puesto $puesto)
    {
        $departamentos = Departamento::get();
        return view("puesto.edit", ["puesto" => $puesto, "departamentos" => $departamentos]);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function update(StorePuestoPost $request, Puesto $puesto)
    {
        $puesto->update($request->validated());
        return Redirect::to("puesto")->with('status','Puesto Actualizado');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Puesto $puesto)
    {
        $puesto->delete();
        return back()->with('status','Puesto Eliminado');
    }
}

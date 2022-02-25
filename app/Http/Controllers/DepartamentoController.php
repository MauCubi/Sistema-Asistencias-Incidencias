<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreDepartamentoPost;

class DepartamentoController extends Controller
{

    public function __construct(){
        $this->middleware('can:departamento.admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamento::orderBy('created_at','desc')->paginate(10);
        return view("departamento/index",['departamentos' => $departamentos]);
    }

    /**
     * Show the form for creating a new resource
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::get();

        return view("departamento/create",["departamento" => new Departamento(), "areas" => $areas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartamentoPost $request)
    {
        Departamento::create($request->validated());
        return Redirect::to("departamento")->with('status','Departamento Creado Exitosamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {
        return view("departamento.show", ["departamento" => $departamento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamento $departamento)
    {
        $areas = Area::get();
        return view("departamento.edit", ["departamento" => $departamento, "areas" => $areas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDepartamentoPost $request, Departamento $departamento)
    {
        $departamento->update($request->validated());
        return Redirect::to("departamento")->with('status','Departamento Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento)
    {        
        $departamento->delete();
        return back()->with('status','Departamento Eliminado');
    }



}

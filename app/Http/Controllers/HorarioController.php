<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;
use App\Models\CategoriaHorario;
use App\Http\Requests\StoreHorarioPost;
use Illuminate\Support\Facades\Redirect;

class HorarioController extends Controller
{
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
        $user = Auth::user();
        $horarios = Horario::orderBy('created_at','desc')->paginate(10);
        return view("horario/index",['horarios' => $horarios]);
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
        //
    }
}

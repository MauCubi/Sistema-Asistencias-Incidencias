<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Jornada;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJornadaPost;

class JornadaController extends Controller
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
     * @param  \App\Models\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function show(Jornada $jornada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function edit(Jornada $jornada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jornada $jornada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jornada  $jornada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jornada $jornada)
    {
        $jornada->delete();
        return back()->with('status','Jornada Eliminada');
    }


    public function add(StoreJornadaPost $request, $horario)
    {
        $hor = Horario::find($horario);
        $jornada = new Jornada;
        $jornada->entrada = $request->entrada;
        $jornada->salida = $request->salida;

        if ($jornada->entrada < '12:00') {
            $jornada->periodo = true;
        }else{
            $jornada->periodo = false; 
        }
        
        if ($request->has('isLunes')) {
            $jornada->isLunes = true;
        }
        if ($request->has('isMartes')) {
            $jornada->isMartes = true;
        }
        if ($request->has('isMiercoles')) {
            $jornada->isMiercoles = true;
        }
        if ($request->has('isJueves')) {
            $jornada->isJueves = true;
        }
        if ($request->has('isViernes')) {
            $jornada->isViernes = true;
        }
        if ($request->has('isSabado')) {
            $jornada->isSabado = true;
        }
        if ($request->has('isDomingo')) {
            $jornada->isDomingo = true;
        }
 

        $jornada->horario_id = $hor->id;

        $jornada->save();

        //return view("horario.show", ["horario" => $hor]);

        return redirect()->route('horario.show', ["horario" => $hor]);

        
    }

    public function editModal(Request $request)
    {
        $data = Jornada::where('id',$request->id)->first();
        return response()->json($data);
    }

    public function update2(Request $request, Jornada $jornada2)
    {

        $jornada = Jornada::where('id', $request->jornada_id)->first();
        $jornada->entrada = $request->entradaEdit;
        if ($jornada->entrada < '12:00') {
            $jornada->periodo = true;
        }else{
            $jornada->periodo = false; 
        }

        $jornada->salida = $request->salidaEdit;

        if ($request->has('isLunesEdit')) {
            $jornada->isLunes = true;
        }else{
            $jornada->isLunes = false;
        }

        if ($request->has('isMartesEdit')) {
            $jornada->isMartes = true;
        }else{
            $jornada->isMartes = false;
        }

        if ($request->has('isMiercolesEdit')) {
            $jornada->isMiercoles = true;
        }else{
            $jornada->isMiercoles = false;
        }

        if ($request->has('isJuevesEdit')) {
            $jornada->isJueves = true;
        }else{
            $jornada->isJueves = false;
        }

        if ($request->has('isViernesEdit')) {
            $jornada->isViernes = true;
        }else{
            $jornada->isViernes = false;
        }

        if ($request->has('isSabadoEdit')) {
            $jornada->isSabado = true;
        }else{
            $jornada->isSabado = false;
        }

        if ($request->has('isDomingoEdit')) {
            $jornada->isDomingo = true;
        }else{
            $jornada->isDomingo = false;
        }

        $jornada->update();

        return redirect()->route('horario.show', ["horario" => $jornada->horario_id]);
    }
}

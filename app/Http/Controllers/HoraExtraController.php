<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Empleado;
use App\Models\HoraExtra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreHoraExtraPost;

class HoraExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horaextras = HoraExtra::orderBy('created_at','desc')->paginate(10);
        return view("horaextra/index", ["horaextras" => $horaextras]);

    }

    public function indexPersonal()
    {
        $user = Auth::user();
        $horaextras = HoraExtra::where('empleado_id', $user->id)->orderBy('created_at','desc')->paginate(10);
        return view("horaextra/index_personal", ["horaextras" => $horaextras]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = Empleado::get();

        return view("horaextra/create",["horaextra" => new HoraExtra(),"empleados" => $empleados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHoraExtraPost $request)
    {
        //HoraExtra::create($request->validated());  
        $horaextra = new HoraExtra();      
        $horaextra->empleado_id = $request->empleado_id;
        
        $horaextra->start = $request->start;
        $horaextra->end = $request->end;
        $horaextra->hora = 0;
        $horaextra->minuto = 0;     

        //Calculo de cantidad de tiempo trabajado
        $time = new Carbon($horaextra->start);
        $horaextra->hora = $time->diffInHours($horaextra->end);
        $horaextra->minuto = $time->diffInMinutes($horaextra->end);

        if ($horaextra->hora != 0) 
            {
                $horaextra->minuto = $horaextra->minuto - (60 * $horaextra->hora);
            }    

        
        $horaextra->save();
        return Redirect::to("horaextra")->with('status','Hora Extra Creada Exitosamente'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HoraExtra  $horaExtra
     * @return \Illuminate\Http\Response
     */
    public function show(HoraExtra $horaextra)
    {
        return view("horaextra.show", ["horaextra" => $horaextra]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HoraExtra  $horaExtra
     * @return \Illuminate\Http\Response
     */
    public function edit(HoraExtra $horaextra)
    {
        $empleados = Empleado::get();
        return view("horaextra.edit", ["horaextra" => $horaextra, "empleados" => $empleados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HoraExtra  $horaExtra
     * @return \Illuminate\Http\Response
     */
    public function update(StoreHoraExtraPost $request, HoraExtra $horaextra)
    {
        $horaextra->empleado_id = $request->empleado_id;
        $horaextra->start = $request->start;
        $horaextra->end = $request->end;
        $horaextra->hora = 0;
        $horaextra->minuto = 0;     
        $time = new Carbon($horaextra->start);
        $horaextra->hora = $time->diffInHours($horaextra->end);
        $horaextra->minuto = $time->diffInMinutes($horaextra->end);

        if ($horaextra->hora != 0) 
            {
                $horaextra->minuto = $horaextra->minuto - (60 * $horaextra->hora);
            }    

        
        $horaextra->save();
        return Redirect::to("horaextra")->with('status','Hora Extra Actualizada'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HoraExtra  $horaExtra
     * @return \Illuminate\Http\Response
     */
    public function destroy(HoraExtra $horaextra)
    {
        $horaextra->delete();
        return back()->with('status','Hora Extra Eliminada');
    }
}

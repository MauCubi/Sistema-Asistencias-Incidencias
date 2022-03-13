<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAreaPost;
use Illuminate\Support\Facades\Redirect;

class AreaController extends Controller
{
    public function __construct(){
        $this->middleware('can:area.index')->only('index');
        $this->middleware('can:area.edit')->only('edit', 'update');
        $this->middleware('can:area.destroy')->only('destroy');
        $this->middleware('can:area.create')->only('create', 'store');
        $this->middleware('can:area.show')->only('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::orderBy('created_at','desc')->paginate(10);
        return view("area/index",['areas' => $areas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::get();

        return view("area/create",["area" => new Area(), "empresas" => $empresas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAreaPost $request)
    {
        Area::create($request->validated());
        return Redirect::to("area")->with('status','Area Creada Exitosamente');    
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        return view("area.show", ["area" => $area]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        $empresas = Empresa::get();
        return view("area.edit", ["area" => $area, "empresas" => $empresas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAreaPost $request, Area $area)
    {
        $area->update($request->validated());
        return Redirect::to("area")->with('status','Area Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {

        if($area->departamentos->count() == 0){
            $area->delete();
            return back()->with('status','Area Eliminada');
        }else{
            return back()->with('error','No puede eliminarse el area ya que tiene información asociada'); 
        }
    }
}

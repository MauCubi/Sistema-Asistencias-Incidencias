<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmpresaPost;
use Illuminate\Support\Facades\Redirect;

class EmpresaController extends Controller
{

    public function __construct(){
        $this->middleware('can:empresa.index')->only('index');
        $this->middleware('can:empresa.edit')->only('edit', 'update');
        $this->middleware('can:empresa.destroy')->only('destroy');
        $this->middleware('can:empresa.create')->only('create', 'store');
        $this->middleware('can:empresa.show')->only('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::orderBy('created_at','desc')->paginate(10);

        //dd($empresas);

        return view("empresa/index",['empresas' => $empresas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("empresa/create",["empresa" => new Empresa()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmpresaPost $request)
    {
        Empresa::create($request->validated());
        return Redirect::to("empresa")->with('status','Empresa Creada Exitosamente');
        // return back()->with('status','Empresa Creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return view("empresa.show", ["empresa" => $empresa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view("empresa.edit", ["empresa" => $empresa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmpresaPost $request, Empresa $empresa)
    {
        $empresa->update($request->validated());
        return Redirect::to("empresa")->with('status','Empresa Actualizada');
        // return view("empresa.show", ["empresa" => $empresa])->with('status','Empresa Actualizada');
        // return back()->with('status','Empresa Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return back()->with('status','Empresa Eliminada');
    }
}

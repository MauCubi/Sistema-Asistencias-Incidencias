<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\DepartamentoController;


Route::get('/', function () {
    return view('home');
});

Route::get('/admin', function () {
    return view('partials.admin');
});

Route::resource('/empresa', EmpresaController::class);
Route::resource('/area', AreaController::class);
Route::resource('/departamento', DepartamentoController::class);
Route::resource('/puesto', PuestoController::class);
Route::resource('/empleado', EmpleadoController::class);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

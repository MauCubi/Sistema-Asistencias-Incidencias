<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\TipoEventoController;
use App\Http\Controllers\DepartamentoController;


Route::get('/', function () {
    return view('partials.admin');
});



Route::get('/admin', function () {
    return view('partials.admin');
});

Route::resource('/empresa', EmpresaController::class);
Route::resource('/area', AreaController::class);
Route::resource('/departamento', DepartamentoController::class);
Route::resource('/puesto', PuestoController::class);
Route::resource('/empleado', EmpleadoController::class);
Route::resource('/tipoevento', TipoEventoController::class);



// Route::resource('/event', EventController::class);


Route::post('/event/editar/{id}', [EventController::class, 'edit'])->name('event.editar');
Route::post('/event/borrar/{id}', [EventController::class, 'destroy'])->name('event.borrar');
Route::post('/event/actualizar/{event}', [EventController::class, 'update'])->name('event.update');


Route::get('/event/mostrar', [EventController::class, 'mostrar'])->name('event.mostrar');

Route::get('/event/personal', [EventController::class, 'personal'])->name('event.personal');
Route::get('/eventper', [EventController::class, 'indexper'])->name('event.indexper');

Route::get('/event', [EventController::class, 'index'])->name('event.index');
Route::post('/event/store', [EventController::class, 'store'])->name('event.store');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

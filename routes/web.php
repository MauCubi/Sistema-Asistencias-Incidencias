<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\JornadaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\TipoEventoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\IncidenciaHorariaController;


Route::get('/', function () {
    return view('partials.admin');
});



Route::get('/admin', function () {
    return view('partials.admin');
});


Route::get('/empleado/createfind', [EmpleadoController::class, 'createfind'])->name('empleado.createfind');


Route::resource('/empresa', EmpresaController::class);
Route::resource('/area', AreaController::class);
Route::resource('/departamento', DepartamentoController::class);
Route::resource('/puesto', PuestoController::class);
Route::resource('/empleado', EmpleadoController::class);
Route::resource('/tipoevento', TipoEventoController::class);
Route::resource('/horario', HorarioController::class);
Route::resource('/jornada', JornadaController::class);




// Route::resource('/event', EventController::class);



//Rutas de Eventos/Incidencias
Route::delete('/event/{event}', [EventController::class, 'destroy'])->name('event.destroy');

Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
Route::get('/event/create2', [EventController::class, 'create2'])->name('event.create2');

Route::get('/event/{event}/edit', [EventController::class, 'edit'])->name('event.edit');
Route::put('/event/{event}', [EventController::class, 'update'])->name('event.update');
Route::get('/event/mostrar', [EventController::class, 'mostrar'])->name('event.mostrar');
Route::get('/event/personal', [EventController::class, 'personal'])->name('event.personal');
Route::get('/eventper', [EventController::class, 'indexper'])->name('event.indexper');
Route::get('/event', [EventController::class, 'index'])->name('event.index');
Route::get('/events', [EventController::class, 'index2'])->name('event.index2');
Route::get('/event/{event}', [EventController::class, 'show'])->name('event.show');

//Rutas de incidencias personales
Route::delete('/event2/{event}', [EventController::class, 'destroy2'])->name('event.destroy2');
Route::post('/event/store2', [EventController::class, 'store2'])->name('event.store2');
Route::get('/event/{event}/edit2', [EventController::class, 'edit2'])->name('event.edit2');
Route::put('/event2/{event}', [EventController::class, 'update2'])->name('event.update2');
Route::get('/events2', [EventController::class, 'index3'])->name('event.index3');
Route::get('/event2/{event}', [EventController::class, 'show2'])->name('event.show2');


Route::post('/event/editar/{id}', [EventController::class, 'editar'])->name('event.editar');

//Asistencias
Route::get('/asistencia/add', [AsistenciaController::class, 'add'])->name('asistencia.add');
Route::get('/asistencia/marcar', [AsistenciaController::class, 'marcar'])->name('asistencia.marcar');
// Route::get('/asistencia/marcar/{}', [AsistenciaController::class, 'marcar'])->name('asistencia.marcar');

//Jornada
Route::post('/jornada/add/{horario}', [JornadaController::class, 'add'])->name('jornada.add');

//IncidenciaHoraria
Route::get('/inasistencia/add', [IncidenciaHorariaController::class, 'add'])->name('inasistencia.add');








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

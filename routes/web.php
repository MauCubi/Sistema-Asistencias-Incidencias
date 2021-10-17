<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;


Route::get('/', function () {
    return view('home');
});

Route::get('/admin', function () {
    return view('partials.admin');
});

Route::resource('/empresa', EmpresaController::class);


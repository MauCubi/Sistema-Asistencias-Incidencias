<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $today = Carbon::now();
        $week2 = Carbon::now();
        $daysToAdd = 5;
        $week2 = $today->addDays($daysToAdd);
        //dd($week2);
        $eventos = Event::whereHas('tipoevento', function ($query) {
            return $query->where('general', true);
        })->whereBetween('start', [Carbon::today(), $week2])->get();
        //$eventos = Event::whereBetween('start', [Carbon::today(), $week2])->get();

        # ACA FILTRAR LOS PERSONALES
        $feriados1 = Event::whereHas('tipoevento', function ($query) {
            return $query->where('noLaboral', true);
        })->whereHas('tipoevento', function ($query) {
            return $query->where('general', true);
        })->whereBetween('start', [Carbon::today(), $week2])->get();
        
        $feriados2 = Event::whereHas('tipoevento', function ($query) {
            return $query->where('noLaboral', true);
        })->whereHas('tipoevento', function ($query) {
            return $query->where('general', false);
        })->whereBetween('start', [Carbon::today(), $week2])
        ->where('empleado_id', $user->empleado_id)
        ->get();
        #dd($feriados);
        # Comentario
        $feriados = $feriados1->merge($feriados2);

        $personales = Event::whereHas('tipoevento', function ($query) {
            return $query->where('general', false);
        })->where('empleado_id', $user->id )->whereBetween('start', [Carbon::today(), $week2])->get();

        return view('home', ['eventos' => $eventos, 'feriados' => $feriados, 'personales' => $personales]);
    }
}

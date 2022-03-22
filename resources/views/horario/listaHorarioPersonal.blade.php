@extends('partials.admin')

@section('content')

<div class="row d-flex flex-row">
    <div class="p-2">
        <h3 class="text-primary">Mis Horarios</h3>
    </div>
</div>

@include('partials.session-status')
@include('partials.session-error')
<p class="alert alert-info d-none d-sm-block animated fadeIn" >
    Desde aquí, podrá <strong>ver todas sus horarios de trabajo en la semana</strong>.
</p>

<div class="row py-2">
    @if ($jornadas->count() != 0)
        {{-- Lunes --}}
        @if ($lunes->count() != 0)
        <div class="col-md-12 mb-3">
            <div class="card shadow border-left-primary">
                <div class="card-body">
                    <div class="card-title"><b>Lunes</b></div>
                    <ul>
                        @foreach ($lunes as $l)
                            <li> {{$l->entrada}} - {{$l->salida}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>    
        @endif
        

        {{-- Martes --}}
        @if ($martes->count()!=0)
        <div class="col-md-12 mb-3">
            <div class="card shadow border-left-success">
                <div class="card-body">
                    <div class="card-title"><b>Martes</b></div>
                    <ul>
                        @foreach ($martes as $mar)
                            <li> {{$mar->entrada}} - {{$mar->salida}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        {{-- Miercoles --}}
        @if ($miercoles->count()!=0)
        <div class="col-md-12 mb-3">
            <div class="card shadow border-left-info">
                <div class="card-body">
                    <div class="card-title"><b>Miercoles</b></div>
                    <ul>
                        @foreach ($miercoles as $mier)
                            <li> {{$mier->entrada}} - {{$mier->salida}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        {{-- Jueves --}}
        @if ($jueves->count()!=0)
        <div class="col-md-12 mb-3">
            <div class="card shadow border-left-warning">
                <div class="card-body">
                    <div class="card-title"><b>Jueves</b></div>
                    <ul>
                        @foreach ($jueves as $j)
                            <li> {{$j->entrada}} - {{$j->salida}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div> 
        @endif
        

        {{-- Viernes --}}
        @if ($viernes->count()!=0)
        <div class="col-md-12 mb-3">
            <div class="card shadow border-left-danger">
                <div class="card-body">
                    <div class="card-title"><b>Viernes</b></div>
                    <ul>
                        @foreach ($viernes as $v)
                            <li> {{$v->entrada}} - {{$v->salida}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>  
        @endif
        

        {{-- Sabado --}}
        @if ($sabado->count()!=0)
        <div class="col-md-12 mb-3">
            <div class="card shadow border-left-primary">
                <div class="card-body">
                    <div class="card-title"><b>Sabado</b></div>
                    <ul>
                        @foreach ($sabado as $s)
                            <li> {{$s->entrada}} - {{$s->salida}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif
        

        {{-- Domingo --}}
        @if ($domingo->count()!=0)
        <div class="col-md-12 mb-3">
            <div class="card shadow border-left-success">
                <div class="card-body">
                    <div class="card-title"><b>Domingo</b></div>
                    <ul>
                        @foreach ($domingo as $d)
                            <li> {{$d->entrada}} - {{$d->salida}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif
        
    @else
        <div class="col-md-12 mb-3">
            <u><b>No posee horarios disponibles</b></u>
        </div>
    @endif
    
</div>


@endsection
@extends('partials.admin')


@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="col-md-9">
                <h2 style="color:cadetblue">
                    Eventos en los proximos 7 dias
                </h2>
                <hr>
                <div class="card bg-warning text-white mb-6">
                    <div class="card-body">
                        <h3>
                            Eventos Generales
                        </h3>
                            <ul>
                            @if($eventos->count() == 0)
                                <li>No hay Eventos Generales en los proximos 7 días</li>
                            @else
                            @foreach ($eventos as $event)
                                <li><b>{{ $event->title }}</b><ul><li>{{$event->start->format('d/m/Y')}} 
                                    @if ( $event->start != $event->end)
                                    - {{ $event->end->format('d/m/Y')}}
                                    @endif 
                                </li></ul></li>                                
                            @endforeach
                            @endif
                        </ul>
                        
                    </div>
                </div>
                <br>
                <div class="card bg-success text-white mc-6">
                    <div class="card-body">
                        <h3>
                            Eventos Personales
                        </h3>                        
                        <ul>
                            @if($personales->count() == 0)
                                <li>No hay Eventos Personales en los proximos 7 días</li>
                            @else
                            @foreach ($personales as $personal)
                                <li><b>{{ $personal->title }}</b><ul><li>{{$personal->start->format('d/m/Y')}} 
                                    @if ( $personal->start != $personal->end)
                                    - {{ $personal->end->format('d/m/Y')}}
                                    @endif 
                                </li></ul></li>                                
                            @endforeach
                            @endif
                        </ul>                       
                    </div>
                </div>
                <br>
                <div class="card bg-info text-white mc-6">
                    <div class="card-body">
                        <h3>
                            Días no laborales
                        </h3>                        
                        <ul>
                            @if($feriados->count() == 0)
                                <li>No hay Dia no Laborales en los proximos 7 días</li>
                            @else
                            @foreach ($feriados as $feriado)
                                <li><b>{{ $feriado->title }}</b><ul><li>{{$feriado->start->format('d/m/Y')}} 
                                    @if ( $feriado->start != $feriado->end)
                                    - {{ $feriado->end->format('d/m/Y')}}
                                    @endif 
                                </li></ul></li>                                
                            @endforeach
                            @endif
                        </ul>                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

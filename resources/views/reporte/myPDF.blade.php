<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Empleado</title>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>Entre fechas {{ $datestart}} y {{ $dateend }}</p>
    <p>Fecha de generacion del reporte: {{ $date }}</p>    
    <hr>
    <h2 style="color:cornflowerblue">Horas Trabajadas</h2>
    <u><h3>Asistencias</h3></u>
    Total de Asistencias: {{ $cantidadAsistencias }} 
    <br>
    Horas Trabajadas: 
    @if ($horasAsistencia < 10)
        0{{ $horasAsistencia}}
    @else
        {{ $horasAsistencia}}
    @endif
    :
    @if ($minutosAsistencia < 10)
        0{{ $minutosAsistencia}}
    @else
        {{ $minutosAsistencia}}
    @endif

    <u><h3>Horas Extras</h3></u>
    Total de Horas Extras: {{ $cantidadHorasExtras }} 
    <br>
    Horas Trabajadas: 
    @if ($horasHorasExtras < 10)
        0{{ $horasHorasExtras}}
    @else
        {{ $horasHorasExtras}}
    @endif
    :
    @if ($minutosHorasExtras < 10)
        0{{ $minutosHorasExtras}}
    @else
        {{ $minutosHorasExtras}}
    @endif
    <br>
    <b>Total de Horas Trabajadas en el Periodo: </b>
    @if ($horasTotales < 10)
        0{{ $horasTotales}}
    @else
        {{ $horasTotales}}
    @endif
    :
    @if ($minutosTotales < 10)
        0{{ $minutosTotales}}
    @else
        {{ $minutosTotales}}
    @endif
    <br><br>

    <hr>

    <h2 style="color:cornflowerblue">Ausencias Laborales</h2>
    <u><h3>Inasistencias</h3></u>
    Total de Inasistencias Justificadas: {{ $inasistenciaJustificada }}
    <br>
    Total de Inasistencias No Justificadas: {{ $inasistenciaNoJustificada }}
    <br>
    <b>Total de Inasistencias: </b> {{ $inasistenciaTotal }}
    <br><br>

    <hr>

    <h2 style="color:cornflowerblue">Incidencias Horarias</h2>
    <u><h3>Tardanzas</h3></u>
    Total de Tardanzas Justificadas: {{ $tardanzaJustificada }}
    <br>
    Total de Tardanzas No Justificadas: {{ $tardanzaNoJustificada }}
    <br>
    <b>Total de Tardanzas: </b> {{ $tardanzaTotal }}    
    
    <u><h3>Retiros Tempranos</h3></u>
    Total de Retiros Tempranos Justificados: {{ $tempranoJustificada }}
    <br>
    Total de Retiros Tempranos No Justificados: {{ $tempranoNoJustificada }}
    <br>
    <b>Total de Retiros Tempranos: </b> {{ $tempranoTotal }}
    <div style="page-break-before: always;"></div>    

    <h2 style="color:cornflowerblue">Horarios</h2>
    <h3>Lunes</h3>
    <ul>
    @foreach ($horarios as $horario)
        @if ($horario->isLunes)
        <li>{{date('h:m', strtotime($horario->entrada))}} hs - {{date('h:m', strtotime($horario->salida))}} hs</li>
        @endif        
    @endforeach
    </ul>

    <h3>Martes</h3>
    <ul>
    @foreach ($horarios as $horario)
        @if ($horario->isMartes)
       <li>{{date('h:m', strtotime($horario->entrada))}} hs - {{date('h:m', strtotime($horario->salida))}} hs</li>
        @endif        
    @endforeach
    </ul>

    <h3>Miercoles</h3>
    <ul>
    @foreach ($horarios as $horario)
        @if ($horario->isMiercoles)
       <li>{{date('h:m', strtotime($horario->entrada))}} hs - {{date('h:m', strtotime($horario->salida))}} hs</li>
        @endif        
    @endforeach
    </ul>

    <h3>Jueves</h3>
    <ul>
    @foreach ($horarios as $horario)
        @if ($horario->isJueves)
       <li>{{date('h:m', strtotime($horario->entrada))}} hs - {{date('h:m', strtotime($horario->salida))}} hs</li>
        @endif        
    @endforeach
    </ul>

    <h3>Viernes</h3>
    <ul>
    @foreach ($horarios as $horario)
        @if ($horario->isViernes)
       <li>{{date('h:m', strtotime($horario->entrada))}} hs - {{date('h:m', strtotime($horario->salida))}} hs</li>
        @endif        
    @endforeach
    </ul>

    <h3>Sabado</h3>
    <ul>
    @foreach ($horarios as $horario)
        @if ($horario->isSabado)
       <li>{{date('h:m', strtotime($horario->entrada))}} hs - {{date('h:m', strtotime($horario->salida))}} hs</li>
        @endif        
    @endforeach
    </ul>

    <h3>Domingo</h3>
    <ul>
    @foreach ($horarios as $horario)
        @if ($horario->isDomingo)
       <li>{{date('h:m', strtotime($horario->entrada))}} hs - {{date('h:m', strtotime($horario->salida))}} hs</li>
        @endif        
    @endforeach
    </ul>



    {{-- @foreach ($asistencias as $asistencia)
        
    @endforeach --}}
    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> --}}
</body>
</html>
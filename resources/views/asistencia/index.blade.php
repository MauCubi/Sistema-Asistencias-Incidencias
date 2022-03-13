@extends('partials.admin')

@section('content')

<div class="row d-flex flex-row">
    <div class="p-2">
        <h3 class="text-primary">Mis asistencias</h3>
    </div>
</div>

@include('partials.session-status')
@include('partials.session-error')
<p class="alert alert-info d-none d-sm-block animated fadeIn" >
    Desde aquí, podrá <strong>ver todas sus asistencias registradas</strong>.
</p>

<table class="table table-bordered table-hover table-responsive-sm shadow table-sm">
    <thead class="bg-dark text-white">
        <tr>
            <td>
                Fecha
            </td>
            <td>
                Ingreso
            </td>
            <td>
                Salida
            </td>            
            <td>
                
            </td>
        </tr>
    </thead>
    <tbody>
       @foreach ($asistencias as $a)
       <tr>
            <td>
                {{ date_format($a->start, " d/m/Y") }}
            </td>
            <td>
                {{ date_format($a->start, " H:i:s") }}
            </td>
            <td>
                {{ date_format($a->end, " H:i:s") }}
            </td>
            <td>
                <div class="d-flex justify-content-center">
                <a href="{{ route('asistencia.show', $a->id)}}" class="btn btn-primary mr-2 btn-sm"><i class="fa fw fa-info"></i> Ver</a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
@extends('partials.admin')

{{-- INDEX GENERALES --}}

@section('content')
<div class="row d-flex flex-row">
    <div class="p-2">
        <h3 class="text-primary">Listado de Mis Incidencias</h3>
    </div>
</div>

{{-- <a class="btn btn-success mt-3 mb-3" href="{{ route('empresa.create') }}">Crear</a> --}}


@include('partials.session-status')
@include('partials.session-error')
<p class="alert alert-info d-none d-sm-block animated fadeIn" >
    Desde aquí, podrá <strong>Ver</strong> sus Incidencias.
</p>
<table class="table table-bordered table-hover table-responsive-sm shadow table-sm">
    <thead class="bg-dark text-white">
        <tr>
            <td>
                Id
            </td>
            <td>
                Titulo
            </td>        
  
            <td>
                Tipo de Incidencia
            </td>
            <td>
                Fecha de Inicio
            </td>   
            <td>
                Fecha de Finalización
            </td>
      
            <td>
                
            </td>
        </tr>
    </thead>
    <tbody>
        @if($events->count() == 0)
            <td style="background-color:gainsboro" colspan="7">No hay incidencias registradas</td>
        @else
       @foreach ( $events as $event)
       <tr>
            <td>
                {{ $event->id }}
            </td>
            <td>
                {{ $event->title }}
            </td>

            <td>
                {{ $event->tipoevento->nombre }}
            </td>
            <td>
                {{ $event->start->format('Y-m-d') }}
            </td>
            <td>
                {{ $event->end->format('Y-m-d') }}
            </td>

            <td>
                <div class="d-flex justify-content-center">
                <a href="{{ route('event.showpersonal', $event->id)}}" class="btn btn-primary mr-2 btn-sm"><i class="fa fw fa-info"></i> Ver</a>
                                                
                </div>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

    {{ $events->links() }} 



@endsection


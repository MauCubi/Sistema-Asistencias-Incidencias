@extends('partials.admin')



@section('content')
<div class="row d-flex flex-row">
    <div class="p-2">
        <h3 class="text-primary">Mis Horas Extras</h3>
    </div>
</div>

{{-- <a class="btn btn-success mt-3 mb-3" href="{{ route('empresa.create') }}">Crear</a> --}}

<table class="table table-bordered table-hover table-responsive-sm shadow table-sm">
    <thead class="bg-dark text-white">
        <tr>
            <td>
                Id
            </td>  
            <td>
                Entrada
            </td>
            <td>
                Salida    
            </td>
            <td>
                Tiempo de trabajo
            </td>                       
            
        </tr>
    </thead>
    <tbody>
        @if($horaextras->count() == 0)
            <td style="background-color:gainsboro" colspan="5">No hay horas extras registradas</td>
        @else
       @foreach ( $horaextras as $horaextra)
       <tr>
            <td>
                {{ $horaextra->id }}
            </td>
            <td>
                {{ $horaextra->start }}
            </td>
            <td>
                {{ $horaextra->end }}
            </td>
            <td>
                @if ($horaextra->hora < 10)
                    0{{ $horaextra->hora }}
                @else
                    {{ $horaextra->hora }}
                @endif
                :
                @if ($horaextra->minuto < 10)
                    0{{ $horaextra->minuto }}
                @else
                    {{ $horaextra->minuto }}
                @endif
            </td>            
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

{{ $horaextras->links() }}

@endsection


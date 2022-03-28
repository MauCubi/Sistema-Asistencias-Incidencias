@extends('partials.admin')


@section('content')
<div class="row d-flex flex-row">
    <div class="p-2">
        <h3 class="text-primary">Mis Tardanzas</h3>
    </div>
</div>
<p class="alert alert-info d-none d-sm-block animated fadeIn" >
    Desde aquí, podrá <strong>ver todas sus tardanzas registradas</strong>.
</p>
{{-- <a class="btn btn-success mt-3 mb-3" href="{{ route('empresa.create') }}">Crear</a> --}}




<table class="table table-bordered table-hover table-responsive-sm shadow table-sm">
    <thead class="bg-dark text-white">
        <tr>
            <td>
                Id
            </td>
            <td>
                Fecha
            </td>
            <td>
                Justificada
            </td>

            <td>
                
            </td>
        </tr>
    </thead>
    <tbody>
        @if($incidenciashorarias->count() == 0)
            <td style="background-color:gainsboro" colspan="5">No hay tardanzas registradas</td>
        @else
        @foreach ( $incidenciashorarias as $incidenciahoraria)
        <tr>
            <td>
                {{ $incidenciahoraria->id }}
            </td>
            <td>
                {{ $incidenciahoraria->fecha }}
            </td>
            <td style="text-align: center">
                @if ($incidenciahoraria->justificacion)
                    <i class="fas fa-check"></i>
                @else
                    <i class="fas fa-times"></i>
                @endif
            </td>

            <td>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('incidenciahoraria.personal', $incidenciahoraria->id)}}" class="btn btn-primary mr-2 btn-sm"><i
                            class="fa fw fa-info"></i> Ver</a>                    
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

{{ $incidenciashorarias->links() }}

@endsection
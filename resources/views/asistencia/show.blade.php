@extends('partials.admin')


@section('content')


<div class="row d-flex flex-row">
    <div class="p-2">
        <h3 class="text-primary">{{ $asistencia->title }}
        </h3>

    </div>

    <div class="ml-auto p-2 d-flex align-items-center">
        <a href="{{ url()->previous() }}">
            <button class="btn btn-info btn-circle"><i class="fa fw fa-arrow-left"></i></button>
        </a>
    </div>

</div> <!-- fin de row -->

<div class="row py-2">
    <div class="col-md-12">
        <div class="card shadow border-bottom-info">
            <div class="card-body">
                <label class="control-label">
                    <strong>Empleado:</strong>
                    {{ $asistencia->empleado()->first()->apellido }}, {{ $asistencia->empleado()->first()->nombre }}.
                </label>
                <br>
                <label>
                	<strong>Fecha:</strong>
                	{{ date_format($asistencia->start, " d/m/Y") }}
                </label>
                <br>
                <label>
                	<strong>Hora de ingreso: </strong>
                	 {{ date_format($asistencia->start, " H:i:s") }}
                </label>
                <br>
                <label>
                	<strong>Hora de egreso: </strong>
                	 {{ date_format($asistencia->end, " H:i:s") }}
                </label>
            </div>
        </div>
    </div>
</div> <!-- fin de row -->

@endsection
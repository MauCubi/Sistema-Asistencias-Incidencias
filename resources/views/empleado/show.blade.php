@extends('partials.admin')


@section('content')


<div class="row d-flex flex-row">
    <div class="p-2">
        <h3 class="text-primary"> {{ $empleado->apellido }} {{ $empleado->nombre }}
            <a href="{{ route('empleado.edit',$empleado->id) }}">
                <button class="btn btn-warning btn-circle btn-sm">
                    <i class="fa fw fa-edit"></i>
                </button>
            </a>
        </h3>

    </div>

    <div class="ml-auto p-2 d-flex align-items-center">
        <a href="{{ route('empleado.index') }}">
            <button class="btn btn-info btn-circle"><i class="fa fw fa-arrow-left"></i></button>
        </a>
    </div>

</div> <!-- fin de row -->
@include('partials.session-status')
<div class="row py-2">
    <div class="col-md-12">
        <div class="card shadow border-bottom-info">
            <div class="card-body">
                <label class="control-label">
                    <strong>Nombre:</strong>
                    {{ $empleado->nombre }}
                </label>

                <br>

                <label class="control-label">
                    <strong>Apellido:</strong>
                    {{ $empleado->apellido }}
                </label>

                <br>

                <label class="control-label">
                    <strong>DNI:</strong>
                    {{ $empleado->dni }}
                </label>

                <br>

                <label class="control-label">
                    <strong>Dirección:</strong>
                    {{ $empleado->direccion }}
                </label>

                <br>

                <label class="control-label">
                    <strong>Teléfono:</strong>
                    {{ $empleado->telefono }}
                </label>

                <br>

                <label class="control-label">
                    <strong>E-Mail:</strong>
                    {{ $empleado->email }}
                </label>

                <br>

                <label class="control-label">
                    <strong>Alta Sistema:</strong>
                    {{ $empleado->created_at->format('d-m-Y') }}
                </label>

                <br>

                <label class="control-label">
                    <strong>Alta AFIP:</strong>
                    {{ Carbon\Carbon::parse($empleado->altafip)->format('d-m-Y') }}
                </label>

                <br>
                <label class="control-label">
                    <strong>Puesto:</strong>
                    {{ $empleado->puesto->nombre }}
                </label>

                <br>
                <label class="control-label">
                    <strong>Estado:</strong>
                    @if ($empleado->alta == true)
                        <b style="color: green">Alta</b>
                    @else
                        <b style="color: red">Baja</b>
                    @endif
                </label>

                <br>

            </div>
        </div>
    </div>
</div> <!-- fin de row -->


@endsection
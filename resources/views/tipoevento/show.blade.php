@extends('partials.admin')


@section('content')


<div class="row d-flex flex-row">
    <div class="p-2">
        <h3 class="text-primary"> {{ $tipoevento->nombre }}
            <a href="{{ route('tipoevento.edit',$tipoevento->id) }}">
                <button class="btn btn-warning btn-circle btn-sm">
                    <i class="fa fw fa-edit"></i>
                </button>
            </a>
        </h3>

    </div>

    <div class="ml-auto p-2 d-flex align-items-center">
        <a href="{{ route('tipoevento.index') }}">
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
                    {{ $tipoevento->nombre }}
                </label>

                <br>

                <label class="control-label">
                    <strong>Días Límite:</strong>
                    {{ $tipoevento->diasLimite }}
                </label>

                <br>

                <label class="control-label">
                    <strong>General:</strong>
                    @if ($tipoevento->general == true)
                        <i class="fas fa-check"></i>
                    @else
                        <i class="fas fa-times"></i>
                    @endif
                </label>

                <br>

                <label class="control-label">
                    <strong>Aplica descuentos:</strong>
                    @if ($tipoevento->descuento == true)
                        <i class="fas fa-check"></i>
                    @else
                        <i class="fas fa-times"></i>
                    @endif
                </label>

                <br>

                <label class="control-label">
                    <strong>Día no laboral:</strong>
                    @if ($tipoevento->noLaboral == true)
                        <i class="fas fa-check"></i>
                    @else
                        <i class="fas fa-times"></i>
                    @endif
                </label>
                <br>
                

            </div>
        </div>
    </div>
</div> <!-- fin de row -->


@endsection
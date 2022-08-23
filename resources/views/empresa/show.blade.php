@extends('partials.admin')


@section('content')


<div class="row d-flex flex-row">
    <div class="p-2">
        <h3 class="text-primary">{{ $empresa->nombre }}
            <a href="{{ route('empresa.edit',$empresa->id) }}">
                <button class="btn btn-warning btn-circle btn-sm">
                    <i class="fa fw fa-edit"></i>
                </button>
            </a>
        </h3>

    </div>

    <div class="ml-auto p-2 d-flex align-items-center">
        <a href="{{ route('empresa.index') }}">
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
                    <strong>CUIT:</strong>
                    {{ $empresa->cuit }}
                </label>
                <br>
                <label class="control-label">
                    <strong>Razon social:</strong>
                    {{ $empresa->nombre }}
                </label>
                <br>
                <label class="control-label">
                    <strong>Email: </strong>
                    @if ($empresa->contacto)
                        {{ $empresa->contacto }}
                    @else
                        <i>No posee email</i>
                    @endif
                </label>
                <br>
                <label class="control-label">
                    <strong>Teléfono: </strong>
                    @if ($empresa->telefono)
                        {{ $empresa->telefono }}
                    @else
                        <i>No posee teléfono</i>
                    @endif
                </label>

            </div>
        </div>
    </div>
</div> <!-- fin de row -->


@endsection
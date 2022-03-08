@extends('partials.admin')


@section('content')
<div class="row d-flex flex-row">
    <div class="p-2">
        <h3 class="text-primary">Generar Reporte</h3>
    </div>
</div>

{{-- @include('partials.validation-error') --}}

<form target="_blank" action="{{  route("pdf.generar")  }}" method="post">
@include('reporte.selectEmpleado')
</form>

@endsection
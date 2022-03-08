@extends('partials.admin')


@section('content')
<div class="row d-flex flex-row">
    <div class="p-2">
        <h3 class="text-primary">Editar Inasistencia</h3>
    </div>
    <div class="ml-auto p-2 d-flex align-items-center">
        <a href="{{ route('incidenciahoraria.index', 3) }}">
            <button class="btn btn-info btn-circle"><i class="fa fw fa-arrow-left"></i></button>
        </a>
    </div>
</div>
{{-- @include('partials.validation-error') --}}

<form action="{{  route("incidenciahoraria.update", $incidenciahoraria)  }}" method="post" class="was-validated">
    @method('PUT')
    @include('incidenciahoraria.inasistencia._form')
</form>
<br>

@endsection
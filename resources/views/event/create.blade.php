@extends('partials.admin')


@section('content')

<div class="row d-flex flex-row">
    <div class="p-2">
        <h3 class="text-primary">Registrar una Incidencia</h3>
    </div>
    <div class="ml-auto p-2 d-flex align-items-center">
        <a href="{{ route('event.index2') }}">
            <button class="btn btn-info btn-circle"><i class="fa fw fa-arrow-left"></i></button>
        </a>
    </div>
</div>

@include('partials.validation-error')
@include('partials.session-error')

<form action="{{  route("event.store")  }}" method="post">
@include('event._form')
</form>

@endsection
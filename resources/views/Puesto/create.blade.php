@extends('partials.admin')


@section('content')
<div class="row d-flex flex-row">
    <div class="p-2">
        <h3 class="text-primary">Registrar un Puesto</h3>
    </div>
    <div class="ml-auto p-2 d-flex align-items-center">
        <a href="{{ route('puesto.index') }}">
            <button class="btn btn-info btn-circle"><i class="fa fw fa-arrow-left"></i></button>
        </a>
    </div>
</div>

{{-- @include('partials.validation-error') --}}

<form action="{{  route("puesto.store")  }}" method="post">
@include('puesto._form')
</form>

@endsection
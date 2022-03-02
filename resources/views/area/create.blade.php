@extends('partials.admin')


@section('content')
<div class="row d-flex flex-row">
    <div class="p-2">
        <h3 class="text-primary">Registrar un Area</h3>
    </div>
    <div class="ml-auto p-2 d-flex align-items-center">
        <a href="{{ route('area.index') }}">
            <button class="btn btn-info btn-circle"><i class="fa fw fa-arrow-left"></i></button>
        </a>
    </div>
</div>

{{-- @include('partials.validation-error') --}}
<div class="card">
    <div class="card-body">
<form action="{{  route("area.store")  }}" method="post">
@include('area._form')
</form>
    </div>
</div>
@endsection
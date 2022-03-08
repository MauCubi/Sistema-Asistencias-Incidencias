@extends('partials.admin')


@section('content')
<div class="row d-flex flex-row">
    <div class="p-2">
        <h3 class="text-primary">Editar un rol</h3>
    </div>
    <div class="ml-auto p-2 d-flex align-items-center">
        <a href="{{ route('role.index') }}">
            <button class="btn btn-info btn-circle"><i class="fa fw fa-arrow-left"></i></button>
        </a>
    </div>
</div>
@include('partials.validation-error')
<div class="card">
    <div class="card-body">
        <form action="{{  route("role.update", $role->id) }}" method="post">
            @method('PUT')
            @include('role._form')
        </form>
    </div>
</div>
<br>

@endsection
@extends('partials.admin')


@section('content')


<div class="row d-flex flex-row">
    <div class="p-2">
        <h3 class="text-primary">{{ $role->name }}
            <a href="{{ route('role.edit',$role->id) }}">
                <button class="btn btn-warning btn-circle btn-sm">
                    <i class="fa fw fa-edit"></i>
                </button>
            </a>
        </h3>

    </div>

    <div class="ml-auto p-2 d-flex align-items-center">
        <a href="{{ route('role.index') }}">
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
                    <strong>Nombre del Rol:</strong>
                    {{ $role->name }}
                </label>
                <hr>
                
                <h3><b>Listado de Permisos</b></h2>
                @foreach ($role->permissions as $permission)
                    <li>{{ $permission->description}} </li>
                @endforeach

            </div>
        </div>
    </div>
</div> <!-- fin de row -->


@endsection